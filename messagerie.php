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
            <a class="messagerie__user-profile">
                <img class="profil-picture" src="images/default-profil-picture.png">
                <span>TEST</span>
            </a>
        </div>
    </section>

    <section id="messagerie__right-sidebar" class="container column">
        <h1>TEST</h1>
        <div class="messagerie__container" id="doejohn@gmail.com-chat-log">
            <div class="message-date" id="messages-21-05-2024">
                <div class="ligne"></div>
                <span class="date">21 Mai 2024</span>
                <div class="ligne"></div>
            </div>
            <div class="new-message">
                <div class="new-message-header">
                    <img class="profil-picture" src="images/default-profil-picture.png">
                </div>
                <div class="new-message-content">
                    <div class="new-message-content-header">
                        <span class="new-message-content-header-pseudo">PSEUDO</span>
                        <span class="new-message-content-header-date">DATE</span>
                    </div>
                    <span class="new-message-content-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum hendrerit erat at tincidunt. Aenean varius lectus quis volutpat sagittis. Integer feugiat porttitor aliquam. Aliquam odio felis, rutrum in nibh nec, eleifend posuere enim. Aenean ac dictum felis. Vivamus sit amet venenatis lectus, eu dapibus nisl. Vivamus at mollis ligula. Integer sed consectetur metus. Ut eu elementum nulla. Sed commodo, neque in facilisis consequat, tellus libero rutrum dui, in condimentum ante nisi et ipsum. Nam ac dapibus nisl, sit amet aliquam tellus. Morbi id placerat velit. Nullam leo sem, pellentesque eu ligula id, dignissim eleifend tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus urna justo, condimentum eget erat ac, sagittis tristique urna. </span>
                </div>
            </div>
            <div class="new-message">
                <div class="new-message-content">
                    <span class="new-message-content-text">b</span>
                </div>
            </div>
        </div>
        <form class="messagerie__input">
            <textarea id="messagerie__input-text"></textarea> 
        </form>
    </section>
</main>

<?php require_once __DIR__. "/inc/footer.php"; ?>