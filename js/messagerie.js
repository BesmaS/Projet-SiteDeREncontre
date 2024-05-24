$(document).ready(function() 
{
    $("#messagerie__input-text").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            if($("#messages-" +getCurrentDate()).length == 0) {
                createMessageDate();
            }

            
            createNewMessage();
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
                    makeAjaxRequestPromise('/../php/get_user.php', 'POST', {userJsonPath : userJsonPath})
                    .then(function(response) {
                        var user = JSON.parse(response);
                        createUserProfile(user);
                    })
                    .catch(function(error) {
                        console.log(error); 
                    });

                } else {
                    console.log("Key not found:", email);
                }
            });

        }).fail(function() {
            console.error("Error loading JSON file:", jsonFilePath);
        });
    }

    function createUserProfile(user){
        var userProfileElement = $("<a>").addClass("messagerie__user-profile");

        var profilPictureElement = $('<img>').addClass("profil-picture");
        profilPictureElement.attr("src", "images/default-profil-picture.png");

        userProfileElement.append(profilPictureElement);

        var pseudoElement = $("<span>");
        pseudoElement.text(user.pseudo)

        userProfileElement.append(pseudoElement);

        // Append the anchor element to the document body or any other parent element
        $('#profiles').append(userProfileElement);
    }

    function createMessageDate(){
        var messageDateElement = $('<div>').addClass("message-date").attr("id", "messages-" + getCurrentDate());

        var ligneElement1 = $('<div>').addClass("ligne");
        messageDateElement.append(ligneElement1);

        var dateElement = $('<span>').addClass("date");
        dateElement.text(getCurrentDate());
        messageDateElement.append(dateElement);

        var ligneElement2 = $('<div>').addClass("ligne");
        messageDateElement.append(ligneElement2);

        $('#chat-log').append(messageDateElement);
    }

    function createNewMessage(){        
        var newMessageElement = $('<div>').addClass("new-message");

        var newMessageContentElement = $('<div>').addClass("new-message-content");
        newMessageElement.append(newMessageContentElement);

        var newMessageContentTextElement = $('<span>').addClass("new-message-content-text");
        newMessageContentTextElement.text($("#messagerie__input-text").val());
        newMessageContentElement.append(newMessageContentTextElement);
        
        // Append the anchor element to the document body or any other parent element
        $('#chat-log').append(newMessageElement);
    }
});



