<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    $js = array(
        'js/messagerie.js',
    );
    require_once __DIR__. "/inc/head.php";
?> 
<?php require_once __DIR__. "/inc/header.php"; ?>

<main id="messagerie">
    <section id="messagerie__left-sidebar" class="container column">
        <h1>Messages</h1>
        <div class="messagerie__container" id="profiles">
        </div>
    </section>

    <section id="messagerie__right-sidebar" class="container column">
        <h1 id="messagerie__right-sidebar-user-pseudo"></h1>
        <div class="messagerie__container chat-log">
        </div>
        <form class="messagerie__input" id="messagerie__input">
            <textarea id="messagerie__input-text"></textarea> 
        </form>
    </section>
</main>

<?php require_once __DIR__. "/inc/footer.php"; ?>