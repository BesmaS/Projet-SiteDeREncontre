$(document).ready(function() 
{
    fetch('php/database/users.json')
    .then(response => response.json())
    .then(users => {
        loadUsersCard(users);
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Button pour filtrer les utilisateurs
    $('#recherche-button').click(function() {
        
        $("#user-cards").empty();

        fetch('php/database/users.json')
        .then(response => response.json())
        .then(users => {
            filterUsers(users);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    });

    // Button pour aller en arrière lorsqu'on est dans le profile d'un utilisateur
    $('#profile-previous-button').click(function() {

        $(".catalogue__user-information").css("visibility", "collapse");

        $("#users").css("visibility", "visible");

    });

    // Button pour contacter l'utilisateur dans la messagerie
    $('#catalogue__user-information-header-DM-button').click(function() {
        
        makeAjaxRequestPromise('./php/contact_user.php', 'POST', {recever : $('.catalogue__user-information').attr('id').replace('-profil', '')})
        .then(function(response) {
            console.log(response);
            if (response != false){
                // Redirection vers la page messagerie
                window.location.href='messagerie.php';
            }
        })
        .catch(function(error) {
            console.log(error);
        });
        
    });

    

    function loadUsersCard(users){    
        var promises = [];

        // Pour chaque utilisateur qui se trouve dans users.json
        for (let email in users) {
            if (users.hasOwnProperty(email)) {
                var userJsonPath = users[email];
                // Récuperer les données de l'utilisateur pour creer le user-card
                var promise = makeAjaxRequestPromise('./php/get_user.php', 'POST', {email : email, userJsonPath: userJsonPath})
                .then(function(response) {
                    console.log(response);
                    if (response != false){
                        // Créer la carte de l'utilisateur
                        var user = JSON.parse(response);
                        createUserCard(user);
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
                promises.push(promise);
            }
        }

        // Lorsque tous les user-card on été crées, ajouter l'event permettant d'afficher le profil en détail
        Promise.all(promises).then((values) => {
            $("a.user-card").click(function(e) {
                e.preventDefault();

                $("#users").css("visibility", "collapse");
                
                var email = $(this).attr('id').replace('-card', '');
                $('.catalogue__user-information').attr('id', email + "-profil");

                let path = "php/database/" + email + "/data.json";

                makeAjaxRequestPromise(path, 'GET')
                .then(userJsonData => {
                    $("#catalogue__user-information-descriptions").empty();

                    $('#catalogue__user-information-header-pseudo').text(userJsonData["pseudo"]);
                    $('#catalogue__user-information-header-age').text(calculateAge(userJsonData["date-de-naissance"]));
                    $('#catalogue__user-information-header-sexe').text(userJsonData["sexe"]);
                    $(".catalogue__user-information").css("visibility", "visible");

                    if (userJsonData["message-accueil"] != ""){
                        $("#catalogue__user-information-descriptions").append($("<h1>", { 
                            text: "Message d'accueil" })
                        )
                        $("#catalogue__user-information-descriptions").append($("<p>", { 
                            text: "\" " + userJsonData["message-accueil"] + " \"" })
                        )
                    }

                    if (userJsonData["citation"] != ""){
                        $("#catalogue__user-information-descriptions").append($("<h1>", { 
                            text: "Citation" })
                        )
                        $("#catalogue__user-information-descriptions").append($("<p>", { 
                            text: "\" " + userJsonData["citation"] + " \""})
                        )
                    }

                })
                .catch(error => {
                    console.error("Error loading JSON file 1", error);
                });

                console.log(path);
            });
        });
    }

    function createUserCard(user){
        // crée l element
        var $userCardElement = $("<a>", {
            class: "user-card",
            id: user.email.replace(/[^a-zA-Z0-9]/g, '_') + "-card"
        });

        // Créez l'élément div avec la classe "block" 
        var $blockDiv = $("<div>", { class: "block" }).appendTo($userCardElement);

        // Créez l'élément image avec la classe "profil-picture" 
        $("<img>", {
            class: "profil-picture",
            src: "images/default-profil-picture.png"
        }).appendTo($blockDiv);

        // Créez l'élément span avec la classe "user-card__age" et définis le texte
        $("<span>", {
            class: "user-card__pseudo",
            text: user.pseudo
        }).appendTo($userCardElement);

        // Créez l'élément span avec la classe "user-card__age" et définis le texte
        $("<span>", {
            class: "user-card__age",
            text: user.age
        }).appendTo($userCardElement);
    
        // Ajoutez l'élément de lien au corps du document ou à tout autre élément parent
        $('#user-cards').append($userCardElement);
    }

    function filterUsers(users){
        var promises = [];

        // Pour chaque utilisateur qui se trouve dans users.json
        for (let email in users) {
            if (users.hasOwnProperty(email)) {
                var userJsonPath = users[email];
                // Récuperer les données de l'utilisateur pour creer le user-card avec les options
                // userJsonPath : Chemin du fichier des données de l'utilisateur
                // searchFormData : Les données du formulaire permettant de faire le filtrage
                var promise = makeAjaxRequestPromise('./php/filter_users.php', 'POST', {userJsonPath: userJsonPath, searchFormData : $('#search-form').serialize()})
                .then(function(response) {
                    console.log(response);
                    if (response != false){
                        var user = JSON.parse(response);
                        createUserCard(user);
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
                promises.push(promise);
            }
        }
    }
});

