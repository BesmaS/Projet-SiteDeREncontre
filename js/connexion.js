$(document).ready(function() 
{
    $('#login-button').click(function() {
        makeAjaxRequestPromise('/../php/connexion.php', 'POST', $('#regForm').serialize())
        .then(function(response){
            if (response == true){
                window.location.href = 'profil.php';
            } 
            else {
                $(".error-message-box").css("visibility", "visible");
            }
        })
        .catch(function(error){
          console.log(error); 
       });
    });
});