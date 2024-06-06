<?php
    // inscription.php
    // Inscrit un nouveau utilisateur dans le site
    include 'stockerphoto.php';

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
            
            // Enlever les caractères spéciaux
            $userJsonFileName = preg_replace('/[^a-zA-Z0-9]/', '_', $email);
            
            $newUserDataFolder =  "database\\" . $userJsonFileName;
            // Créer le dossier pour l'utilisateur
            if (!is_dir($newUserDataFolder)) {
                mkdir($newUserDataFolder, 0777, true);
            }

            $messagesFolder = $newUserDataFolder . "\\messages";
            // Créer le dossier "messages" pour l'utilisateur
            if (!is_dir($messagesFolder)) {
                mkdir($messagesFolder, 0777, true);
            }
            
            // Chemin du fichier json de l'utilisateur, où ces données sont conservées.
            $newUserJsonPath = $newUserDataFolder . "\\data.json"; 
            storeProfilePicture($email, $_FILES['profile_picture']);

            $newUser = array(
                "email" => $email,
                "nom" => strtoupper($_POST["nom"]),
                "prenom" => ucfirst($_POST["prenom"]),
                "adresse" => $_POST["adresse"],
                "mot-de-passe" => password_hash($_POST["mot-de-passe"], PASSWORD_DEFAULT),
                "pseudo" => $_POST["pseudo"],
                "sexe" => $_POST["sexe"],
                "date-de-naissance" => $_POST["date-de-naissance"],
                "profession" => $_POST["profession"],
                "taille" => $_POST["taille-m"] . $_POST["taille-cm"],
                "poids" => $_POST["poids"],
                "couleur-cheveux" => $_POST["couleur-cheveux"],
                "couleur-yeux" => $_POST["couleur-yeux"],
                "message-accueil" => $_POST["message-accueil"],
                "citation" => $_POST["citation"],
                "traits" => $_POST["traits"],
                "centres" => $_POST["centres"],
                "fumeur" => $_POST["fumeur"],
                "musiques" => $_POST["musique"],
                "date-abonemment" => "",
                "abonne" => "non",
                "ban" => "non",
            );

            $_SESSION["email"] = $userJsonFileName;

            // Mettre le chemin du fichier json dans l'email de l'utilisateur dans users.json
            $users[$email] = $newUserJsonPath;

            // Ecrire le nouveau utilisateur dans users.json
            file_put_contents($usersJsonPath, json_encode($users, JSON_PRETTY_PRINT));
            // Ecrire les données du nouvelle utilisateur dans son fichier json
            file_put_contents($newUserJsonPath, json_encode($newUser, JSON_PRETTY_PRINT)); 
            
            echo 1;
            return;
        }
    }
    
    echo 0;
    return;
?>
