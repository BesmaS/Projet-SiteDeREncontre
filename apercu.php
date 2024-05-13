<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION["email"])){
        header("Location: accueil.php");
    }

    require_once __DIR__. "/inc/head.php";
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <main class="apercu">
            <section id="apercu-compte" class="block">
                <h1>Compte</h1>
                <a>
                    <span>Modifier le profile</span>
                </a>
                <a>
                    <span>Caractéristiques</span>
                </a>
                <a>
                    <span>Vos goûts musicaux</span>
                </a>
            </section>
        </main>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>