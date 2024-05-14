<?php
    // get_session_email.php
    // Recupere l'email de la session

    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_SESSION["email"])) {
            echo $_SESSION["email"];
            return;
        }
    }

    echo 0;
    return;
?>