<!DOCTYPE html>
<html lang="fr">
<head>
   
    <title>SpotiLove - Abonnements</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <?php include __DIR__ . "/inc/header.php"; ?>
       <main>
        <!-- Section "hero" -->
        <section class="hero">
            <h1>Choisissez votre abonnement SpotiLove</h1>
            <p>Trouvez l'amour grâce à nos fonctionnalités premium</p>
        </section>

            <div class="plans">
                <div class="plan">
                    <h2>Gratuit</h2>
                    <p>0€ / mois</p>
                    <ul>
                        <li>Accès limité</li>
                        <li>10 profils par jour</li>
                        <li>Publicité</li>
                    </ul>
                    <form action="process_abonnement.php" method="post">
                        <input type="hidden" name="plan" value="gratuit">
            
                    </form>
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
                    <a href="abonnement_premium.php" class="btn-first">S'abonner</a>
                </div>
            </div>
        </section>
