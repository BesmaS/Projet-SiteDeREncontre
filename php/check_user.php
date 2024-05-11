<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si le dossier "database" existe
        $databaseFolderPath = "database";
        if (!file_exists($databaseFolderPath)) {
            // Si non, on retourne que l'utilisateur n'existe pas
            echo 0;
            return;
        }

        // Vérifie si le fichier contenant les utilisateurs existe
        $usersJsonPath = "database\\users.json";
        if (!file_exists($usersJsonPath)) {
            // Si non, on retourne que l'utilisateur n'existe pas
            echo 0;
            return;
        }
        else{
            // Si oui, on récupère les données du fichier
            $usersData = file_get_contents($usersJsonPath);
            $users = json_decode($usersData, true);
        }
        
        $email = $_POST['email'];
        // On vérifie si l'email est déjà pris
        if (array_key_exists($email, $users)){
            // Si oui, on retourne que l'utilisateur existe
            echo 1;
            return;
        }
    }
?>