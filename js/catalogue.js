$(document).ready(function() 
{
    fetch('database\\users.json')
    .then(response => response.json())
    .then(users => {
        // Loop through the keys of the parsed JSON object
        for (let email in users) {
            if (users.hasOwnProperty(email)) {
                var userJsonPath = users[email];
                console.log("Path to data file:", userJsonPath);
                makeAjaxRequestPromise('/../php/get_user.php', 'POST', {userJsonPath : userJsonPath})
                .then(function(response) {
                    var user = JSON.parse(response);
                    createUserCard(user);
                })
                .catch(function(error) {
                    console.log(error); 
                });
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });


});

function createUserCard(email){
    var userCardElement = $("<a>").addClass("user-card");
    var userCardPseudoElement = $("<span>").addClass("user-card-pseudo");

    userCardPseudoElement.text(email.pseudo);

    var blockElement = $('<div>').addClass("block");

    var profilPictureElement = $('<img>').addClass("profil-picture");
    profilPictureElement.attr("src", "images/default-profil-picture.png")

    //

    userCardElement.append(blockElement);
    userCardElement.append(userCardPseudoElement);

    blockElement.append(profilPictureElement);

    // Append the anchor element to the document body or any other parent element
    $('#user-cards').append(userCardElement);
}