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
    
                // A faire, montrer le profile;
            });
        });
    }

    function createUserCard(user){
        var userCardElement = `
            <a class="user-card" id="${user.email}">
                <div class="block">
                    <img class="profil-picture" src="images/default-profil-picture.png">
                </div>
                <span class="user-card__pseudo">${user.pseudo}</span>
                <span class="user-card__age">${user.age}</span>
            </a>
        `;
    
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

