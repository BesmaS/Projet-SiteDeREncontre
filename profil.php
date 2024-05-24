<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION["email"])){
        header("Location: accueil.php");
    }

    require_once __DIR__. "/inc/head.php";
?>
<?php require_once __DIR__. "/inc/header.php"; ?>

<main class="profil">
</main>

<?php require_once __DIR__. "/inc/footer.php"; ?>