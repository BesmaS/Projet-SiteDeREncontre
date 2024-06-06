<?php
// Récupérer l'email de l'utilisateur à bannir
$email = $_POST['email'];

// Récupérer les données de l'utilisateur
$userData = file_get_contents('php/database/' . $email . '.json');
$user = json_decode($userData, true);

// Bannir l'utilisateur
$user['ban'] = true;

// Enregistrer les nouvelles données de l'utilisateur
$userData = json_encode($user);
file_put_contents('php/database/' . $email . '.json', $userData);

echo 'success';
?>