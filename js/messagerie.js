$(document).ready(function() 
{
    $("#messagerie__input-text").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            e.preventDefault();

            if($("#messages-" + getCurrentDate()).length == 0) {
                createMessageDate($(".messagerie__user-profile.active").attr("id"));
            }

            makeAjaxRequestPromise('/../php/write_new_message.php', 'POST', {newMessage : $("#messagerie__input-text").val(), recever : "foobar@gmail.com"})
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
            return makeAjaxRequestPromise('/../php/get_files.php', 'POST', {directory : "database/" + response + "/messages/"});
        })
        .then(function(response) {
            var emails = JSON.parse(response);

            loadUsersProfile(emails);
        })
        .catch(function(error) {
            console.log(error); 
        });
    }

    function loadUsersProfile(emails){
        var promises = [];

        // Load the JSON file
        $.getJSON("database/users.json", function(usersJsonData) {
            
            // Pour chaque utilisateurs dont l'utilisateur à déjà parler
            // Charger son profile dans les messages
            $.each(emails, function(index, value) {
                var email = value.replace('.json', '');
                
                // Si la valeur existe dans users.json
                if (usersJsonData[email]) {
                    var userJsonPath = usersJsonData[email];
                    // Récuperer les données de l'utilisateur
                    var promise = makeAjaxRequestPromise('/../php/get_user.php', 'POST', {email : email, userJsonPath : userJsonPath})
                    .then(function(response) {
                        var user = JSON.parse(response);
                        createUserProfile(user);
                    })
                    .catch(function(error) {
                        console.log(error); 
                    });
                    promises.push(promise);

                } else {
                    console.log("Key not found:", email);
                }
            });

        }).fail(function() {
            console.error("Error loading JSON file:", jsonFilePath);
        });

        Promise.all(promises).then((values) => {
            $(".messagerie__user-profile").click( function() {
                console.log("test");
        
                $(".messagerie__user-profile").removeClass("active");
            
                // Add 'active' class to the clicked element
                $(this).addClass("active");
            });
        });
    }

    function loadMessages(){

        makeAjaxRequestPromise('/../php/get_session_email.php', 'GET', null)
        .then(function(email) {
            // Load the JSON file
            $.getJSON("database/" + email + "/messages/" + $(".messagerie__user-profile.active").attr("id"), function(messages) {
                // Parcourir chaque message
                messages.forEach(function(message) {
                    if($("#messages-" + message.date).length == 0) {
                        createMessageDate($(".messagerie__user-profile.active").attr("id"));
                    }
                    createNewMessage($(".messagerie__user-profile.active").attr("id"), message);
                });

            }).fail(function() {
                console.error("Error");
            });
        })
        .catch(function(error) {
            console.log(error); 
        });
    }

    function createUserProfile(user){
        var userProfileElement = `
            <a class="messagerie__user-profile" id="${user.email}">
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
        $("#" + $.escapeSelector(recever)  + "-chat-log").append(messageDateElement);
    }

    function createNewMessage(recever, newMessage){
        var newMessageElement = `
            <div class="new-message" id="message-${newMessage.id}">
                <div class="new-message-content">
                    <span class="new-message-content-text">${newMessage.content}</span>
                </div>
            </div>
        `;

        // Append the anchor element to the document body or any other parent element
        // esacepeSelector pour le signe "@"
        $("#" + $.escapeSelector(recever) + "-chat-log").append(newMessageElement);
    }
});



