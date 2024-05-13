$(document).ready(function() 
{
    $('.dropbtn').click(function() {
        if ($('.dropdown-content').css('display') === 'block'){
            $(".dropdown-content").css("display", "none");
        }
        else {
            $(".dropdown-content").css("display", "block");
        }
    });

    $(window).click(function(e) {
        if (!$(e.target).hasClass('dropbtn')) {
            $(".dropdown-content").css("display", "none");
        }
    });

    $('.logout-button').click(function() {
        makeAjaxRequestPromise('/../php/deconnexion.php', 'POST', null)
        .then(function(response){
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

function removeErrorMessageBox(id){
    if($("#" + id + "-error-message").length) {
        $("#" + id + "-error-message").remove();
    }
}

function createErrorMessageBox(message, id){
    removeErrorMessageBox(id);
    var errorMessageBox = $('<div>').addClass("error-message").attr('id', id + '-error-message').html(`<span>${message}</span>`);
    var div = $('#' + id);
    div.after(errorMessageBox);
}

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