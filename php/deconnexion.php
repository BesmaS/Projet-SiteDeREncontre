<?php
    // deconnexion.php
    // Détruit la session pour se deconnecter.

    if(session_status() === PHP_SESSION_NONE) session_start();

    session_unset(); 
    session_destroy();
?>