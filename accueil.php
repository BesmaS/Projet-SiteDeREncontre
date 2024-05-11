<?php 
    if(session_status() === PHP_SESSION_NONE) session_start();

    include __DIR__. "/inc/head.php"
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <section class="accueil-titre">
            <div class="container column titre">
                <h1><span>Sp </span><span> <img src="images/logo-Spotilove.png" class="titre-image"></span>
                    <span> tiLove</span></h1>
                <h3>Trouver votre ame soeur parmis des milliers de profil selon vos gout musicaux</h3>
                <?php if (!isset($_SESSION["email"])) : ?>
                    <div class="container">
                        <a href="inscription.php" class="btn-first">S'inscrire</a>
                        <a href="connexion.php" class="btn-first">Se connecter</a>
                    </div>
                <?php endif ?>
            </div>
        </section>
        
        <section class="accueil-information">
        </section>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>