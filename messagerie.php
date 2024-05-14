<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    $js = array(
        'js/messagerie.js',
    );
    require_once __DIR__. "/inc/head.php";
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <main id="messagerie">
            <section id="messagerie__left-sidebar" class="container column">
                <h1>Messages</h1>
                <div class="messagerie__container" id="profiles">
                    <a class="messagerie__user-profile">
                        <img class="profil-picture" src="images/default-profil-picture.png">
                        <span>TEST</span>
                    </a>
                </div>
            </section>

            <section id="messagerie__right-sidebar" class="container column">
                <h1>TEST</h1>
                <div class="messagerie__container">

                </div>
                <form class="messagerie__input">
                    <textarea></textarea> 
                </form>
            </section>
        </main>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>