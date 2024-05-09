$(document).ready(function() 
{
    ///// https://www.w3schools.com/howto/howto_js_form_steps.asp /////

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    // Met l'onglet suivant
    $('.tab-next-button').click(function() {
        nextPrev(1);
    });

    // Met l'onglet précédent
    $('.tab-previous-button').click(function() {
        nextPrev(-1);
    });

    function showTab(n) 
    {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "flex";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            $(".tab-previous-button").css("visibility", "none");
        } else {
            $(".tab-previous-button").css("visibility", "inline");
        }
        if (n == (x.length - 1)) {
            $(".tab-next-button").text("VALIDER");
        } else {
            $(".tab-next-button").text("Suivant");
        }
        // ... and run a function that displays the correct step indicator:
    }

    function nextPrev(n) 
    {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        // if (n == 1 && !validateForm()) return false;
        
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab += n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) 
        {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        
        showTab(currentTab);
    }

    function validateForm() 
    {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) 
    {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }

    /////
});