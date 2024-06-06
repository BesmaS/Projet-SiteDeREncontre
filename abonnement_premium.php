<!DOCTYPE html>
<html lang="fr">
<head>
    
    <title>SpotiLove - Abonnement Premium</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <?php include __DIR__ . "/inc/header.php"; ?>
        <section class="abonnement">
            <div class="abonnement-header">
                <h1>Formulaire d'abonnement Premium</h1>
            </div>
            <div class="form-container">
                <form action="process_abonnement.php" method="post">
                    <input type="hidden" name="plan" value="premium">
                    <label for="card-number">Numéro de carte:</label>
                    <input type="text" id="card-number" name="card-number" required>
                    <label for="expiry-date">Date d'expiration:</label>
                    <input type="text" id="expiry-date" name="expiry-date" required>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required>
                    <button type="submit" class="btn-first">Valider l'abonnement</button>
                </form>
            </div>
        </section>
        <?php include __DIR__ . "/inc/footer.php"; ?>
    </div>
</body>
</html>
