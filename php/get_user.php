<?php
    // get_user.php
    // Récupère les données d'un utilisateur avec son chemin d'accès
    // (Ne récupère pas les données de la l'utilisateur connecté)

    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userJsonPath = $_POST["userJsonPath"];

        // Si le fichier existe ET si ce n'est pas l'utilisateur connecté
        if (file_exists($userJsonPath) && strcasecmp($_SESSION["email"], $_POST["email"]) != 0){

            // Ouvrir le fichier json
            $userData = file_get_contents($userJsonPath);

            echo $userData;
            return;
        }
    }

    echo 0;
    return;
?>