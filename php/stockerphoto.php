<?php 
function storeProfilePicture($username, $file) {
    // Définir le répertoire où les images de profil seront stockées
    $target_dir = "images/profiles/";

    // Définir le chemin du fichier cible
    $target_file = $target_dir . basename($file["name"]);
    // Déplacer le fichier uploadé vers le répertoire cible
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        // Lire les données de l'utilisateur à partir du fichier JSON
        $json = file_get_contents('database\\' . $username . '\\data.json');
        $data = json_decode($json, true);

        // Ajouter le chemin de l'image de profil aux données de l'utilisateur
        $data['profile_picture'] = $target_file;

        // Écrire les données de l'utilisateur dans le fichier JSON
        $json = json_encode($data);
        file_put_contents('database\\' . $username . '\\data.json', $json);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
