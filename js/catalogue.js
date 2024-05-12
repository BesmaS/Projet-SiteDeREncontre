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
                    console.log(JSON.parse(response));
                    createUserCard(email);
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

    var blockElement = $('<div>').addClass("block");

    userCardElement.append(blockElement);

    // Append the anchor element to the document body or any other parent element
    $('#user-cards').append(userCardElement);
}