<?php
    // connexion.php
    // Vérifie si l'email existe bien dans la base de données
    // Si oui, alors le programme vérifie si le mot de passe entrée est le bon

    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Vérifie si le fichier contenant les utilisateurs existe
        $usersJsonPath = "database\\users.json";
        if (file_exists($usersJsonPath)) {
            $usersData = file_get_contents($usersJsonPath);
            $users = json_decode($usersData, true);
            
            // L'email et le mot de passe entrées par l'utilisateur
            $email = $_POST["email"];
            $password = $_POST["mot-de-passe"];

            // Chemin du fichier json de l'utilisateur
            $userJsonPath = $users[$email];

            // Vérifie si l'email existe dans users.json ET si le ficher json de l'utilisateur existe
            if (array_key_exists($email, $users) && file_exists($userJsonPath)) {
                
                $userData = json_decode(file_get_contents($userJsonPath), true);
                $passwordHash = $userData["mot-de-passe"];
                
                // Vérifie si le mot de passe correspond bien
                if (password_verify($password, $passwordHash)) {

                    $_SESSION["email"] = $email;

                    echo 1;
                    return;
                }
            }
        }
    }

    echo 0;
    return;
?>