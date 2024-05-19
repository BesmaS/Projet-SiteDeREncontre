<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if (isset($_SESSION["email"])){
        header("Location: accueil.php");
    }

    $js = array(
        'js/connexion.js',
    );
    require_once __DIR__. "/inc/head.php";
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <main id="connexion-form">
            <div class="container column">
                
                <form id="regForm">
                    <div class="container column form-inner">
                        <div class="container column form-header">
                            <h1>Connexion</h1>
                        </div>
                        <div class="input-group">
                            <label for="inscription-email">Adresse mail</label>
                            <input type="email" id="inscription-email" name="email" placeholder="Adresse e-mail">
                        </div>
                        <div class="input-group">
                            <label for="inscription-mot-de-passe">Mot de passe</label>
                            <input type="password" id="inscription-mot-de-passe" name="mot-de-passe" placeholder="Mot de passe">
                        </div>
                        <button class="form-button" type="button" id="login-button">Suivant</button>
                    </div>
                </form>

            </div>
        </main>

    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>