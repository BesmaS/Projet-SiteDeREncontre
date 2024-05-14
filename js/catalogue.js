$(document).ready(function() 
{
    fetch('database/users.json')
    .then(response => response.json())
    .then(users => {
        loadUsersCard(users);
    })
    .catch(error => {
        console.error('Error:', error);
    });

    $('#recherche-button').click(function() {
        
        $("#user-cards").empty();

        fetch('database/users.json')
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
                console.log("Path to data file:", userJsonPath);
                // Récuperer les données de l'utilisateur pour creer le user-card
                var promise = makeAjaxRequestPromise('/../php/get_user.php', 'POST', {userJsonPath: userJsonPath})
                .then(function(response) {
                    var user = JSON.parse(response);
                    createUserCard(user);
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
    
                // A faire, montrer le profile;
            });;
        });
    }

    function createUserCard(user){
        var userCardElement = $("<a>").addClass("user-card");
        userCardElement.attr("id", user.email);
        
        // User Card elements
        var blockElement = $('<div>').addClass("block");
    
        userCardElement.append(blockElement);
    
        var pseudoElement = $("<span>").addClass("user-card-pseudo");
        pseudoElement.text(user.pseudo);
    
        userCardElement.append(pseudoElement);
    
        // Block elements
        var profilPictureElement = $('<img>').addClass("profil-picture");
        profilPictureElement.attr("src", "images/default-profil-picture.png")
    
        blockElement.append(profilPictureElement);
    
        // Append the anchor element to the document body or any other parent element
        $('#user-cards').append(userCardElement);
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

