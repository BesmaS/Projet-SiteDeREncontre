<header>
        <?php if (basename($_SERVER['PHP_SELF']) !== "accueil.php") : ?>
            <img class="header-decoration" src="images/title-Spotilove.png">
        <?php else : ?>
            <div class="header-decoration container column">
                <div class="l1"></div>
                <div class="l2"></div>
            </div>
        <?php endif; ?>
        <nav class="navbar">
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <div class="dropdown" style="float:right;">
                    <button class="dropbtn"></button>
                    <div class="dropdown-content">
                        <a href="#">Profil</a>
                        <a href="#">Préférences</a>
                    </div>
                </div>
            </ul>
        </nav>
</header>