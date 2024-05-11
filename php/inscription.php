<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si le dossier "database" existe
        $databaseFolderPath = "database";
        if (!file_exists($databaseFolderPath)) {
            mkdir('database', 0777, true);
        }

        // Vérifie si le fichier contenant les utilisateurs existe
        $usersJsonPath = "database\\users.json";
        if (!file_exists($usersJsonPath)) {
            $users = array();
        }
        else{
            $usersData = file_get_contents($usersJsonPath);
            $users = json_decode($usersData, true);
        }

        $email = $_POST['email'];
        if (!array_key_exists($email, $users)){
            
            $newUserDataFolder =  "database\\" . $email;
            // Créer le dossier pour l'utilisateur
            if (!is_dir($newUserDataFolder)) {
                mkdir($newUserDataFolder, 0777, true);
            }
            
            $newUserJsonPath = "database\\" . $email . "\\data.json"; // Chemin d'accès au fichier JSON pour l'utilisateur

            $newUser = array(
                "email" => $email,
                "nom" => strtoupper($_POST["nom"]),
                "prenom" => ucfirst($_POST["prenom"]),
                "adresse" => $_POST["adresse"],
                "motDePasse" => password_hash($_POST["mot-de-passe"], PASSWORD_DEFAULT),
                "pseudo" => $_POST["pseudo"],
            );

            $_SESSION["email"] = $email;
            $users[$email] = $newUserJsonPath;

            file_put_contents($usersJsonPath, json_encode($users, JSON_PRETTY_PRINT)); // Enregistre le tableau des utilisateurs dans le fichier users.json
            file_put_contents($newUserJsonPath, json_encode($newUser, JSON_PRETTY_PRINT)); // Enregistre les données de l'utilisateur dans le fichier JSON correspondant
            
            echo 1;
            return;
        }
    }
    
    echo 0;
    return;
?>