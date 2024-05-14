<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (is_dir($_POST["directory"])) {

            // Recupere les fichiers contenu dans le dossier
            // Enlève les dossiers qui se nomme "." et ".."
            $files = array_diff(scandir($_POST["directory"]), array('.', '..'));

            // Retourne les fichiers contenu dans le dossier
            echo json_encode(array_values($files));
            return;
        }
    }

    echo 0;
    return;
?>