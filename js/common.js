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