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
<body>
<?php include __DIR__. "/inc/header.php"?>

    <div class="wrapper">

   
        
        <main class="profil">
            <h1>Edit Profile</h1>
            <form action="update_profile.php" method="post">
                <label for="prenom">First Name:</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $currentUser['prenom']; ?>">

                <input type="submit" value="Update Profile">
            </form>
        </main>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>
