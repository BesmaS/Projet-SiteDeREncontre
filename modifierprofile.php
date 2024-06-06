<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION["email"])){
        header("Location: accueil.php");
    }

    require_once __DIR__. "/inc/head.php";

    $currentUserEmail = $_SESSION["email"];
    $json = file_get_contents("php\\database\\$currentUserEmail\\data.json");
    $user = json_decode($json, true);
    if ($user === null) {
        die("Erreur lors de la lecture des données utilisateur.");
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update user information
        $user['prenom'] = $_POST['prenom'];
        $user['nom'] = $_POST['nom'];
        $user['pseudo'] = $_POST['pseudo'];
        $user['citation'] = $_POST['citation'];
        $user['message-accueil'] = $_POST['message-accueil'];
        

        // Encode user data to JSON
        $json = json_encode($user);

        // Write user data to file
        file_put_contents("php\\database\\$currentUserEmail\\data.json", $json);
    }
?>
<?php require_once __DIR__. "/inc/header.php"; ?>
<main class="profil">
    <h1>Edit Profile</h1>
    <form action="" method="post">
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo $user['pseudo']; ?>">

        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>">

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>">

        <label for="nom">Citation:</label>
        <input type="text" id="citation" name="citation" value="<?php echo $user['citation']; ?>">

        <label for="nom">Message d'acceuil:</label>
        <input type="text" id="message-accueil" name="message-accueil" value="<?php echo $user['message-accueil']; ?>">



        <input type="submit" value="Modifier ">
    </form>
</main>
<?php require_once __DIR__. "/inc/footer.php"; ?>
