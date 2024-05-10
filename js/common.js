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