<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    $js = array(
        'js/catalogue.js',
    );
    require_once __DIR__. "/inc/head.php";
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <main id="catalogue">
            
            <section id="catalogue-left-sidebar" class="block">
                <span>TEST</span>
            </section>
            
            <section id="catalogue-right-sidebar" class="block">
                <h1>Derniers utilisateurs inscrits</h1>
                <div id="user-cards" class="container">
                    <a class="user-card">
                        <div class="block">
                        </div>
                        <span class="user-card-pseudo">Pseudo</span>
                    </a>
                    
                </div>
            </section>
            
        </main>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>