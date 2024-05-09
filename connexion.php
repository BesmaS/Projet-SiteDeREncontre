<?php include __DIR__. "/inc/head.php"?>
<body>
    <div class="wrapper">
        <header>
            <img class="header-decoration" src="images/title-Spotilove.png">
            <nav class="navbar">
                <ul>
                    <li><a href="accueil.php">Accueil</a></li>
                </ul>
            </nav>
        </header>
        
        <section class="connexion-form">
            <div class="container column">
                <h1>Connexion</h1>
                <form>
                    <div class="input-group">
                        <label for="connexion-email">Adresse e-mail</label>
                        <input type="email" id="connexion-email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="connexion-password">Mot de passe</label>
                        <input type="email" id="connexion-password" name="password" required>
                    </div>
                    <button type="submit">Suivant</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>