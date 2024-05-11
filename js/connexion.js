$(document).ready(function() 
{
    $('#login-button').click(function() {
        makeAjaxRequestPromise('/../php/connexion.php', 'POST', $('#regForm').serialize())
        .then(function(response){
            if (response == true){
                window.location.href = 'profil.php';
            }
        })
        .catch(function(error){
          console.log(error); 
       });
    });
});