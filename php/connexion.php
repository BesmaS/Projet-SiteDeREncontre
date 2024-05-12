<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Vérifie si le fichier contenant les utilisateurs existe
        $usersJsonPath = "database\\users.json";
        if (!file_exists($usersJsonPath)) {
            $errorMessage = createErrorMessage();
        }
        else {
            $usersData = file_get_contents($usersJsonPath);
            $users = json_decode($usersData, true);
            
            $email = $_POST["email"];
            $password = $_POST["mot-de-passe"];

            // Vérifie si l'email existe dans users.json ET
            if (array_key_exists($email, $users) && file_exists($users[$email])) {
                            
                $userData = json_decode(file_get_contents($users[$email]), true);
                $passwordHash = $userData["motDePasse"];

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