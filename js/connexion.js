$(document).ready(function() 
{
    $('#login-button').click(function() {
        showLoader("login-button", "loader--1");
        makeAjaxRequestPromise('./php/connexion.php', 'POST', $('#regForm').serialize())
        .then(function(response){
            if (response == true){
                removeLoader("login-button");
                window.location.href = 'apercu.php';
            } 
            else {
                removeLoader("login-button");
            }
        })
        .catch(function(error){
          console.log(error); 
       });
    });
});