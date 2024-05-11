<?php
    require_once __DIR__. "/inc/head.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $usersJsonPath = "\\database\\users.json";
        if (!file_exists($usersJsonPath)) {
            $errorMessage = createErrorMessage();
        }
        else {
            $usersData = file_get_contents($usersJsonPath);
            $users = json_decode($usersData, true);
            
            $email = $_POST["email"];
            $password = $_POST["mot-de-passe"];

            if (array_key_exists($email, $users) && file_exists($users[$email])) {
                            
                $userData = json_decode(file_get_contents($users[$email]), true);
                $passwordHash = $userData["motDePasse"];

                if (password_verify($password, $passwordHash)) {
                    header("Location: accueil.php");
                }
                else {
                    $errorMessage = createErrorMessage();
                }
            }
            else {
                $errorMessage = createErrorMessage();
            }
        }
    }

    function createErrorMessage(){
        return "<div class='error-message-box'><span>test</span></div>";
    }
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <section class="connexion-form">
            <div class="container column">
                
                <form id="regForm" action="connexion.php" method="POST">
                    <div class="container column form-inner">
                        <div class="container column form-header">
                            <h1>Connexion</h1>
                        </div>
                        <?php if (isset($errorMessage)) { echo "$errorMessage"; } ?>
                        <div class="input-group">
                            <label for="inscription-email">Adresse mail</label>
                            <input type="email" id="inscription-email" name="email" placeholder="Adresse e-mail">
                        </div>
                        <div class="input-group">
                            <label for="inscription-mot-de-passe">Mot de passe</label>
                            <input type="password" id="inscription-mot-de-passe" name="mot-de-passe" placeholder="Mot de passe">
                        </div>
                        <button type="submit">Suivant</button>
                    </div>
                </form>

            </div>
        </section>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>