$(document).ready(function() 
{
    if(!$(".messagerie__user-profile").hasClass("active")){
        $("#messagerie__right-sidebar").css("visibility", "collapse");
    }

    $("#messagerie__input-text").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            e.preventDefault();

            if($("#messages-" + getCurrentDate()).length == 0) {
                createMessageDate($(".messagerie__user-profile.active").attr("id"));
            }

            makeAjaxRequestPromise('/../php/write_new_message.php', 'POST', {newMessage : $("#messagerie__input-text").val(), recever : "foobar_gmail_com"})
            .then(function(response) {
                console.log(response);
                if (response != false){
                    message = JSON.parse(response);
                    createNewMessage($(".messagerie__user-profile.active").attr("id"), message);
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

    function getUsersProfile()
    {
        // Récuperer l'email de l'utilisateur connecté
        makeAjaxRequestPromise('/../php/get_session_email.php', 'GET', null)
        .then(function(response) {
            // Récuperer les fichiers dans le dossier "messages" de l'utilisateur
            return makeAjaxRequestPromise('/../php/get_files.php', 'POST', {directory : "php/database/" + response + "/messages/"});
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

        emails.forEach(email => {
            let path = "php/database/" + email.split('.').slice(0, -1).join('.') + "/data.json";

            promise = makeAjaxRequestPromise(path, 'GET')
            .then(userJsonData => {
                createUserProfile(email.split('.').slice(0, -1).join('.'), userJsonData);
            })
            .catch(error => {
                console.error("Error loading JSON file 1", error);
            });

            promises.push(promise);
        });

        Promise.all(promises)
        .then(() => {
            $("a.messagerie__user-profile").click( function(e) {
                e.preventDefault();

                console.log("test");

                $("#messagerie__right-sidebar").css("visibility", "visible");
            
                $("a.messagerie__user-profile").removeClass("active");
            
                // Add 'active' class to the clicked element
                $(this).addClass("active");

                // Charger les messages de l'utilisateur
                console.log($(this).attr('id'));
                $('.chat-log').attr('id', $(this).attr('id') + "-chat-log");

                loadMessages();
            });
        })
        .catch((error) => {
            console.error("One or more AJAX requests failed.", error);
            // Handle the error if any of the requests failed
        });
    }

    function loadMessages(){
        // Récuperer l'email de l'utilisateur connecté
        makeAjaxRequestPromise('/../php/get_session_email.php', 'GET')
        .then(function(email) {
            let path = "php/database/" + email + "/messages/" + $(".messagerie__user-profile.active").attr("id") + ".json";
            console.log(path);
            
            makeAjaxRequestPromise(path, 'GET')
            .then(messages => {
                // Créer chaque message
                messages.forEach(function(message) {
                    // S'il n'y a pas de message pour date actuelle, créer l'entête pour la date actuelle avant le message
                    if($("#messages-" + message.date).length == 0) {
                        createMessageDate($(".messagerie__user-profile.active").attr("id"));
                    }
                    // Créer le message
                    createNewMessage($(".messagerie__user-profile.active").attr("id"), message);
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

    function createMessageDate(recever){
        var messageDateElement = `
            <div class="message-date" id="messages-${getCurrentDate()}">
                <div class="ligne"></div>
                <span class="date">${getCurrentDate()}</span>
                <div class="ligne"></div>
            </div>
        `;

        // esacepeSelector pour le signe "@"
        $("#" + recever  + "-chat-log").append(messageDateElement);
    }

    function createNewMessage(recever, newMessage){
        console.log(recever);
        var newMessageElement = `
            <div class="new-message" id="message-${newMessage.id}">
                <div class="new-message-content">
                    <span class="new-message-content-text">${newMessage.content}</span>
                </div>
            </div>
        `;

        // Append the anchor element to the document body or any other parent element
        // esacepeSelector pour le signe "@"
        console.log("#" + recever + "-chat-log");
        $("#" + recever + "-chat-log").append(newMessageElement);
    }
});



