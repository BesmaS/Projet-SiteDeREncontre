<?php 
    if(session_status() === PHP_SESSION_NONE) session_start();

    include __DIR__. "/inc/head.php"
?>
<?php require_once __DIR__. "/inc/header.php"; ?>

<main>
    <section class="hero">
        <h1>Choisissez votre abonnement SpotiLove</h1>
        <p>Trouvez l'amour grâce à nos fonctionnalités premium</p>
    </section>

    <section class="plans">
        <!-- Plan gratuit -->
        <div class="plan">
            <h2>Gratuit</h2>
            <p>0€ / mois</p>
            <ul>
                <li>Accès limité</li>
                <li>10 profils par jour</li>
                <li>Publicité</li>
            </ul>
        </div>
        <div class="plan premium">
            <h2>Premium</h2>
            <p>9,99€ / mois</p>
            <ul>
                <li>Accès illimité</li>
                <li>Profils illimités</li>
                <li>Sans publicité</li>
                <li>Fonctionnalités avancées</li>
            </ul>
            <button>S'abonner</button>
        </div>
    </section>
</main>

<?php require_once __DIR__. "/inc/footer.php"; ?>
