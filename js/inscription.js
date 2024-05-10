$(document).ready(function() 
{
    ///// https://www.w3schools.com/howto/howto_js_form_steps.asp /////

    var currentTab = 0; // Current tab is set to be the first tab (0)

    var tabs = $(".tab");

    // Si des onglets existe, afficher l'onglet actuel
    if( tabs.length ){
        afficherOnglet(currentTab);
    }

    // Met l'onglet suivant
    $('.tab-next-button').click(function() {
        changerOnglet(1);
    });

    // Met l'onglet précédent
    $('.tab-previous-button').click(function() {
        changerOnglet(-1);
    });

    function afficherOnglet(n) 
    {
        $(".current-tab-text").text(n);

        $(tabs[n]).css("display", "flex");
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            $(".tab-previous-button").css("visibility", "hidden");
        } else {
            $(".tab-previous-button").css("visibility", "visible");
        }
        if (n == (tabs.length - 1)) {
            $(".tab-next-button").text("Valider");
        } else {
            $(".tab-next-button").text("Suivant");
        }

        // Mettre à jour la barre de progression
        var progressBar = $(".progress-bar-fill")
        if( progressBar.length ){
            var percentage = n / progressBar.length * 100;            
            $(progressBar[n - 1]).css("width", percentage + "%");
        }
    }

    function changerOnglet(n) 
    {
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()){
            return false;
        } 
        
        // Hide the current tab:
        $(tabs[currentTab]).css("display", "none");
        // Increase or decrease the current tab by 1:
        currentTab += n;
        // if you have reached the end of the form... :
        if (currentTab >= tabs.length) 
        {
            //...the form gets submitted:
            $("#regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        
        afficherOnglet(currentTab);
    }

    /////

    function validateForm(){
        var valid = true;

        switch (currentTab){
            case 0:
                valid = validateEmail();
                break;
            case 1:
                valid = validatePassword();
                break;
            case 2:
                valid = validatePseudo();
                valid = validateGender();
                valid = validateBirthYear();
                break;
            default:
                break;
        }
        return valid;
    }

    // $("#inscription-email").blur(function() {
    //     validateEmail();
    // }); 
    function validateEmail(){
        let regex =  
        /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/; 
        let email = $("#inscription-email").val();
        if (regex.test(email) && email != "") { 
            valid = true; 
            removeErrorMessageBox("inscription-email");
        } else { 
            valid = false;
            createErrorMessageBox("Cette adresse e-mail est non valide. Assurez-vous qu'elle respecte ce format : exemple@email.com", "inscription-email");
        } 
        return valid;
    }

    function validatePassword(){
        let password = $("#inscription-mot-de-passe").val();
        if (password != "") { 
            valid = true; 
            removeErrorMessageBox("inscription-mot-de-passe");
        } else { 
            valid = false;
            createErrorMessageBox("TEST", "inscription-mot-de-passe");
        } 
        return valid;
    }

    function validatePseudo(){
        let pseudo = $("#inscription-pseudo").val();
        if (pseudo != "") { 
            valid = true; 
            removeErrorMessageBox("inscription-pseudo");
        } else { 
            valid = false;
            createErrorMessageBox("TEST2", "inscription-pseudo");
        } 
        return valid;
    }

    function validateGender(){
        let gender = $("#inscription-sexe").is(":checked");
        console.log(gender);
        if (gender) { 
            valid = true; 
            removeErrorMessageBox("inscription-sexe-error");
        } else { 
            valid = false;
            createErrorMessageBox("TEST3", "inscription-sexe-error");
        } 
        return valid;
    }

    function validateBirthYear(){
        let birthYear = $("#inscription-date-de-naissance").val();
        if (birthYear != "") { 
            valid = true; 
            removeErrorMessageBox("inscription-date-de-naissance");
        } else { 
            valid = false;
            createErrorMessageBox("TEST4", "inscription-date-de-naissance");
        } 
        return valid;
    }
});