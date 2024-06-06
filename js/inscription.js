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

    console.log("test");

    // Event pour le button lorsque l'utilisateur entre l'email
    $("#submit-email-button").click(function () {
        var email = $("#inscription-email").val();
        // Si l'email est valide, vérifier si l'email n'est pas déja pris
        if (validateEmail()){
            showLoader("submit-email-button", "loader--1");
            makeAjaxRequestPromise('./php/check_user.php', 'POST', {email : email})
            .then(function(response) {
                // Si l'email n'existe pas, passer à l'onglet suivant
                if (response == false){
                    removeLoader("submit-email-button");
                    changerOnglet(1);
                }
                else {
                    removeLoader("submit-email-button");
                    createErrorMessageBox("Cette adresse e-mail est déjà pris", "inscription-email");
                }
                
            })
            .catch(function(error) {
                console.log(error); 
            });
        }
    });

    // Affiche le contenu d'un onglet n, avec n le numéro de l'onglet
    // n : le numéro de l'onglet que l'on veut afficher
    function afficherOnglet(n) 
    {
        $(".current-tab-text").text(n);
        $(".total-tab-text").text(tabs.length - 1);

        $(tabs[n]).css("display", "flex");
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            $(".tab-previous-button").css("visibility", "collapse");
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
            // n - 1, puisqu'on ne compte pas le premier onglet        
            $(progressBar[n - 1]).css("width", percentage + "%");
        }
    }

    // n : le numéro de l'onglet que l'on veut afficher
    function changerOnglet(n) 
    {
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()){
            return false;
        } 
        
        // Cache l'onglet actuelle:
        $(tabs[currentTab]).css("display", "none");
        // Augmente ou dimininue le buméro de l'onglet actuelle:
        currentTab += n;
        
        // A la fin du formulaire
        if (currentTab >= tabs.length) 
        {
            // Poster le formulaire
            submitForm();
            return false;
        }
        
        // Sinon, afficher une autre onglet
        afficherOnglet(currentTab);
    }

    /////

    function validateForm(){
        // Liste pour vérifier si tout est valide
        let valids = [];

        switch (currentTab){
            case 1:
                valids.push(validatePassword());
                break;
            case 2:
                valids.push(validatePseudo());
                valids.push(validateGender());
                valids.push(validateBirthYear());
                break;
            case 5:
                valids.push(validateMusics());
                break;
            default:
                break;
        }

        // Regarder si tout est valide
        for (let i = 0; i < valids.length; i++) {
            // Si non, on retourne que l'utilisateur ne peut pas aller au suivant
            if (valids[i] == false){
                return false;
            }
        }        

        // Tout est valide, l'utilisateur peut aller au suivant
        return true;
    }

    function submitForm(){
        makeAjaxRequestPromise('./php/inscription.php', 'POST', $('#regForm').serialize())
        .then(function(response){
            console.log(response);
            if (response == true){
                window.location.href = 'accueil.php';
            }
        })
        .catch(function(error){
          console.log(error); 
       });
    }

    function validateEmail(){
        var valid = false;

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
        var valid = false;

        let password = $("#inscription-mot-de-passe").val();
        if (password != "") { 
            valid = true; 
            removeErrorMessageBox("inscription-mot-de-passe");
        } else { 
            valid = false;
            createErrorMessageBox("Veuillez saisir un mot de passe.", "inscription-mot-de-passe");
        } 
        return valid;
    }

    function validatePseudo(){
        var valid = false;

        let pseudo = $("#inscription-pseudo").val();
        if (pseudo != "") { 
            valid = true; 
            removeErrorMessageBox("inscription-pseudo");
        } else { 
            valid = false;
            createErrorMessageBox("Veuillez saisir un pseudo pour votre profil.", "inscription-pseudo");
        } 
        return valid;
    }

    function validateGender(){
        var valid = false;

        let gender = $("input[type='radio'][name='sexe']:checked").length;
        if (gender > 0) { 
            valid = true; 
            removeErrorMessageBox("inscription-sexe");
        } else { 
            valid = false;
            createErrorMessageBox("Veuillez selectionner votre sexe.", "inscription-sexe");
        } 
        return valid;
    }

    function validateBirthYear(){
        var valid = false;

        let birthYear = $("#inscription-date-de-naissance").val();
        var date = new Date(birthYear);
        
        if (birthYear == "") {
            valid = false;
            createErrorMessageBox("Veuillez saisir votre date de naissance.", "inscription-date-de-naissance"); 
        } else if (getAge(date) > 100){
            valid = false;
            createErrorMessageBox("Vous devez avoir moins de 100 ans.", "inscription-date-de-naissance"); 
        } else if (getAge(date) < 18){
            valid = false;
            createErrorMessageBox("Vous devez avoir plus de 18 ans.", "inscription-date-de-naissance"); 
        } else { 
            valid = true; 
            removeErrorMessageBox("inscription-date-de-naissance");
        } 
        return valid;
    }

    function validateMusics(){
        var valid = false;

        var checkboxes = $('input[name="musique[]"]');
      
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].checked) {
                removeErrorMessageBox("musique"); 
                return true;
          }
        }

        createErrorMessageBox("Veuillez choisir au moins une catégorie.", "musique");

        return valid;
    }
});