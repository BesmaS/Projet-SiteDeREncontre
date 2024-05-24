<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION["email"])){
        header("Location: accueil.php");
    }

    require_once __DIR__. "/inc/head.php";

    $currentUserEmail = $_SESSION["email"];
    $json = file_get_contents(__DIR__ . "/php/database/$currentUserEmail/data.json");
    $user = json_decode($json, true);
    if ($user === null) {
        die("Erreur lors de la lecture des données utilisateur.");
    }
    
?>
<head>

<title>Profil de l'utilisateur</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Assurez-vous de relier votre fichier CSS -->
    <style>
        .profile-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 20px;
            flex-shrink: 0;
        }
        .profile-details {
            flex-grow: 1;
        }
        .profile-details h2 {
            margin: 0 0 10px 0;
        }
        .profile-details p {
            color: #ccc;
            margin: 5px 0;
            font-size: 16px;
        }
    </style>
</head>
<?php require_once __DIR__. "/inc/header.php"; ?>

<main class="apercu">
    <section id="apercu-compte" class="block">
    <h1>Profil</h1>

    <div class="profile-container">
        <div class="profile-picture">
        
        </div>
        <div class="profile-details">
            <h2 class="pseudo"><?php echo htmlspecialchars($user['pseudo']); ?></h2>
            <p><strong>Date de naissance:</strong> <?php echo htmlspecialchars($user['date-de-naissance']); ?></p>
            <p><strong>Profession:</strong> <?php echo htmlspecialchars($user['profession']); ?></p>
            <p><strong>Message d'accueil:</strong> <?php echo htmlspecialchars($user['message-accueil']); ?></p>
            <p><strong>Citation:</strong> <?php echo htmlspecialchars($user['citation']); ?></p>
        </div>
    </div>
    <h1>Compte</h1>

        <a href="modifierprofile.php">
            <span>Modifier le profile</span>
        </a>
        
        <a href="edit_traits.php">
            <span>Caractéristiques</span>
        </a>
        
        <a href="edit_music.php">
            <span>Vos goûts musicaux</span>
        </a>

        <a class="logout-button">
            <span>Se déconnecter</span>
        </a>
    </section>
</main>

<?php require_once __DIR__. "/inc/footer.php"; ?>
