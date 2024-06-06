$(document).ready(function() 
{
    if(!$(".messagerie__user-profile").hasClass("active")){
        $("#messagerie__right-sidebar").css("visibility", "collapse");
    }

    // Entrée de zone de texte pour le nouveau message
    $("#messagerie__input-text").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        // Si l'utilisateur a cliqué "Entrée"
        if (code == 13) {
            e.preventDefault();

            receverEmail = $(".chat-log").attr("id").replace("-chat-log", "");

            // Créer le nouveau message
            makeAjaxRequestPromise('./php/write_new_message.php', 'POST', {newMessage : $("#messagerie__input-text").val(), recever : receverEmail})
            .then(function(response) {
                console.log(response);
                if (response != false){
                    // Créer le nouveau message en HTML et CSS
                    message = JSON.parse(response);

                    let path = "php/database/" + message.sender + "/messages/" + message.recever + ".json";
                    // Charger les messages
                    makeAjaxRequestPromise(path, 'GET')
                    .then(messages => {
                        // Si n'il y a pas eu de message écrit a cette date
                        // Créer l'enête de la date
                        if($("#messages-" + message.date).length == 0) {
                            createMessageDate($(".messagerie__user-profile.active").attr("id"), message);
                        }
                        createMessage(message, messages);
                    })
                    .catch(error => {
                        console.error("Error loading JSON file 2", error);
                    });

                    
                }
                else {
                }
                
            })
            .catch(function(error) {
                console.log(error); 
            });
            $("#messagerie__input-text").val("");
        }
    });

    getUsersProfile();


    setInterval(loadMessages, 1000)

    function getUsersProfile()
    {
        // Récuperer l'email de l'utilisateur connecté
        makeAjaxRequestPromise('./php/get_session_email.php', 'GET', null)
        .then(function(response) {
            // Récuperer les fichiers dans le dossier "messages" de l'utilisateur
            return makeAjaxRequestPromise('./php/get_files.php', 'POST', {directory : "database/" + response + "/messages/"});
        })
        .then(function(response) {
            // Les emails qui se trouve dans le dossier "messages"
            var emails = JSON.parse(response);

            loadUsersProfile(emails);
        })
        .catch(function(error) {
            console.log(error); 
        });
    }

    function loadUsersProfile(emails){
        var promises = [];

        console.log(emails);

        emails.forEach(email => {
            
            // Recuperer les informations de l'utilisateur
            let path = "php/database/" + email.split('.').slice(0, -1).join('.') + "/data.json";
            promise = makeAjaxRequestPromise(path, 'GET')
            .then(userJsonData => {
                createUserProfile(email.split('.').slice(0, -1).join('.'), userJsonData);
            })
            .catch(error => {
                console.error("Error loading User JSON file", error);
            });

            promises.push(promise);
        });

        Promise.all(promises)
        .then(() => {
            // Event lorqu'un profile utilisateur à été cliqué
            $("a.messagerie__user-profile").click( function(e) {
                e.preventDefault();

                $("#messagerie__right-sidebar").css("visibility", "visible");
          
                // Enlever la class active a tout les classe "a.messagerie__user-profile"
                $("a.messagerie__user-profile").removeClass("active");
            
                // Ajouter la classe active à l'élément cliqué
                $(this).addClass("active");

                // Charger les messages de l'utilisateur
                $('.chat-log').attr('id', $(this).attr('id') + "-chat-log");

                loadMessages();
            });
        })
        .catch((error) => {
            console.error("One or more AJAX requests failed.", error);
            // Handle the error if any of the requests failed
        });
    }

    // Charger les messages d'un utilisateur
    function loadMessages(){

        var receverEmail = $(".messagerie__user-profile.active").attr("id");

        if (receverEmail) {
            // Récuperer l'email de l'utilisateur connecté
            makeAjaxRequestPromise('./php/get_session_email.php', 'GET')
            .then(function(senderEmail) {
                let path = "php/database/" + senderEmail + "/messages/" + receverEmail + ".json";
                console.log(path);
                
                // Charger les messages
                makeAjaxRequestPromise(path, 'GET')
                .then(messages => {
                    // Créer chaque message
                    messages.forEach(function(message) {
                        createMessage(message, messages);
                    });
                })
                .catch(error => {
                    console.error("Error loading JSON file 2", error);
                });
            })
            .catch(function(error) {
                console.log(error); 
            });
        }
    }

    function createMessage(message, messages){
        var previousMessage = message.id > 0 ? messages[message.id - 1] : null;

        // S'il n'y a pas de message pour date actuelle, créer l'entête pour la date actuelle avant le message
        console.log(message.date);
        if($("#messages-" + message.date).length == 0) {
            createMessageDate($(".messagerie__user-profile.active").attr("id"), message);
        }
        // Créer le message
        if($("#message-" + message.id).length == 0) {
            if (previousMessage == null || previousMessage.sender != message.sender){
                createNewMessage($(".messagerie__user-profile.active").attr("id"), message, true);
            }
            else {
                createNewMessage($(".messagerie__user-profile.active").attr("id"), message, false);
            }
        }
    }

    /* CSS */

    function createUserProfile(email, user){
        var userProfileElement = `
            <a class="messagerie__user-profile" id="${email}">
                <img class="profil-picture" src="images/default-profil-picture.png">
                <span>${user.pseudo}</span>
            </a>
        `;

        // Append the anchor element to the document body or any other parent element
        $('#profiles').append(userProfileElement);
    }

    function createMessageDate(recever, message){

        var messageDateElement = $("<div>", {
            class: "message-date",
            id: "messages-" + message.date
        }).append(
            $("<div>", { class: "ligne" }),
            $("<span>", { class: "date", text: getDayFromDate(message.date) + " " + getMonthFromDate(message.date) + " " + getYearFromDate(message.date) }),
            $("<div>", { class: "ligne" })
        );
        
        $("#" + recever + "-chat-log").append(messageDateElement);
        
    }

    function createNewMessage(recever, newMessage, createHeader){
        
        var newMessageElement = $("<div>", {
            class: "new-message",
            id: "message-" + newMessage.id,
        });
        
        if (createHeader == true){
            newMessageElement.append(
                $("<div>", { class: "new-message-header" }).append(
                    $("<img>", { class: "profil-picture", src: "images/default-profil-picture.png"})
                )
            );
        }

        var newMessageContentElement = $("<div>", {
             class: "new-message-content" 
        }).appendTo(newMessageElement);

        if (createHeader == true) {
            let path = "php/database/" + newMessage.sender + "/data.json";
            
            // Charger le pseudo de l'utilisateur
            makeAjaxRequestPromise(path, 'GET')
            .then(user => {
                newMessageElement.css("margin-top", "16px");

                // new-message-content-header
                var newMessageContentHeader = $("<span>", { 
                    class: "new-message-content-header"
                }).appendTo(newMessageContentElement);

                newMessageContentHeader.append(
                    $("<span>", { class: "new-message-content-header-pseudo", text: user.pseudo })
                );

                newMessageContentHeader.append(
                    $("<span>", { class: "new-message-content-header-date", text: newMessage.date })
                );
    
                newMessageContentHeader.append(
                    $("<span>", { class: "new-message-content-header-time", text: newMessage.time })
                );
    
                // new-message-content-text
                newMessageContentElement.append(
                    $("<span>", { class: "new-message-content-text", text: newMessage.content })
                );
    
            })
            .catch(error => {
                console.error("Error loading JSON file 2", error);
            });
        }
        else {
            newMessageContentElement.append(
                $("<span>", { class: "new-message-content-text", text: newMessage.content })
            );
        }

        
        $("#" + recever + "-chat-log").append(newMessageElement);
        
    }
});



