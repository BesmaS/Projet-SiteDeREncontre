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

    function loadUsersCard(users){    
        var promises = [];

        // Pour chaque utilisateur qui se trouve dans users.json
        for (let email in users) {
            if (users.hasOwnProperty(email)) {
                var userJsonPath = users[email];
                // Récuperer les données de l'utilisateur pour creer le user-card
                var promise = makeAjaxRequestPromise('/../php/get_user.php', 'POST', {email : email, userJsonPath: userJsonPath})
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

        // Lorsque tous les user-card on été crées, ajouter l'event permettant d'afficher le profil en détail
        Promise.all(promises).then((values) => {
            $("a.user-card").click(function(e) {
                e.preventDefault();

                $("#users").css("visibility", "collapse");

                $("#user-profile").css("visibility", "visible");
    
                console.log("test");
                // A faire, montrer le profile;
            });
        });
    }

    function createUserCard(user){
        // Create the anchor element
        var $userCardElement = $("<a>", {
            class: "user-card",
            id: user.email
        });

        // Create the div element with class "block" and append it to the anchor
        var $blockDiv = $("<div>", { class: "block" }).appendTo($userCardElement);

        // Create the image element with class "profil-picture" and set its src attribute
        $("<img>", {
            class: "profil-picture",
            src: "images/default-profil-picture.png"
        }).appendTo($blockDiv);

        // Create the span element with class "user-card__pseudo" and set its text
        $("<span>", {
            class: "user-card__pseudo",
            text: user.pseudo
        }).appendTo($userCardElement);

        // Create the span element with class "user-card__age" and set its text
        $("<span>", {
            class: "user-card__age",
            text: user.age
        }).appendTo($userCardElement);
    
        // Append the anchor element to the document body or any other parent element
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
                var promise = makeAjaxRequestPromise('/../php/filter_users.php', 'POST', {userJsonPath: userJsonPath, searchFormData : $('#search-form').serialize()})
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

