<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userJsonPath = $_POST["userJsonPath"];
        if (file_exists($userJsonPath)){

            // Ouvrir le fichier json
            $userData = file_get_contents($userJsonPath);

            echo json_encode($userData);
            return;
        }
    }

    echo 0;
    return;
?>