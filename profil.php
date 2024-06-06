<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_GET["email"])){
        header("Location: catalogue.php");
    }

    require_once __DIR__. "/inc/head.php";

    $userEmail = $_GET["email"];
    $json = file_get_contents(__DIR__ . "/database/$userEmail/data.json");
    $user = json_decode($json, true);
    if ($user === null) {
        die("Erreur lors de la lecture des données utilisateur.");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil de <?php echo htmlspecialchars($user['pseudo']); ?></title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($user['pseudo']); ?></h1>

    <div class="profile-container">
        <div class="profile-picture">
            <!-- Vous pouvez ajouter une image de profil ici -->
        </div>
        <div class="profile-details">
            <h2 class="pseudo"><?php echo htmlspecialchars($user['pseudo']); ?></h2>
            <p><strong>Date de naissance:</strong> <?php echo htmlspecialchars($user['date-de-naissance']); ?></p>
            <p><strong>Profession:</strong> <?php echo htmlspecialchars($user['profession']); ?></p>
            <p><strong>Message d'accueil:</strong> <?php echo htmlspecialchars($user['message-accueil']); ?></p>
            <p><strong>Citation:</strong> <?php echo htmlspecialchars($user['citation']); ?></p>
        </div>
    </div>
</body>
</html>
