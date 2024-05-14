$(document).ready(function() 
{
    // Event lorsque l'utilisateur clique sur le button du ménu déroulant
    $('.dropbtn').click(function() {
        if ($('.dropdown-content').css('display') === 'block'){
            $(".dropdown-content").css("display", "none");
        }
        else {
            $(".dropdown-content").css("display", "block");
        }
    });

    // Event lorsque utilisateur clique n'importe où sur la fenetre
    $(window).click(function(e) {
        // Si l'object cliqué n'est pas "dropbtn", cacher le dropdown-content
        if (!$(e.target).hasClass('dropbtn')) {
            $(".dropdown-content").css("display", "none");
        }
    });

    // Event pour le button de deconnexion
    $('.logout-button').click(function() {
        // Appel ajax pour appeler la fonction PHP
        makeAjaxRequestPromise('/../php/deconnexion.php', 'POST', null)
        .then(function(response){
            // Retour à la page d'accueil
            window.location.href = 'accueil.php';
        })
        .catch(function(error){
          console.log(error); 
       });
    });

    $(".dropdown-tab").click(function() {
        var dropdownTabId = $(this).attr('id');
        var dropDownTabContent = "#" + dropdownTabId + "-dropdown-tab-content";
        if ($(dropDownTabContent).css("visibility") !== "visible"){
          $(dropDownTabContent).css("visibility", "visible");
        }
        else {
          $(dropDownTabContent).css("visibility", "collapse");
        }
        
    });
});

// Enlève le message d'erreur à partir d'une ID html
// id : l'ID html, l'élément qu'on veut supprimer
function removeErrorMessageBox(id){
    if($("#" + id + "-error-message").length) {
        $("#" + id + "-error-message").remove();
    }
}

// Créer un message d'erreur
// message : Le message que l'on veut afficher
// id : L'élément parent dans lequel on veut afficher ce message
function createErrorMessageBox(message, id){
    removeErrorMessageBox(id);
    var errorMessageBox = $('<div>').addClass("error-message").attr('id', id + '-error-message').html(`<span>${message}</span>`);
    var div = $('#' + id);
    div.after(errorMessageBox);
}

// Calcul l'age à partir d'une date de modèle dd-mm-yyyy
// inputDate : La date dans lequel on veut obtenir l'age
function getAge(inputDate){
  var currentDate = new Date(); // Récupère la date actuelle

  var ageInMilliseconds = currentDate - inputDate; // Calcul la différence entre deux dates en milliseconds
  var ageInYears = ageInMilliseconds / 1000 / 60 / 60 / 24 / 365.25; // Converti les milliseconds en années

  return ageInYears;
}

function makeAjaxRequestPromise(url, method, data, processData = true, contentType = 'application/x-www-form-urlencoded; charset=UTF-8') 
{
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: url,
      method: method,
      data: data,
      processData: processData,
      contentType: contentType,
      
      success: function(response) {
        resolve(response);
      },
      error: function(xhr, status, error) {
        reject(error);
      }
    });
  });
}