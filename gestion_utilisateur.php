<?php
session_start();


// Gérer les actions du formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['ban'])) {
        // Récupérer l'email de l'utilisateur à bannir
        $emailToBan = $_POST['email'];

        // Récupérer les données de l'utilisateur
        $userData = file_get_contents('php/database/' . $emailToBan . '.json');
        $user = json_decode($userData, true);

        // Bannir l'utilisateur
        $user['banned'] = true;

        // Enregistrer les nouvelles données de l'utilisateur
        $userData = json_encode($user);
        file_put_contents('php/database/' . $emailToBan . '.json', $userData);
    }
}


// Récupérer la liste des utilisateurs
$usersData = file_get_contents('php/database/users.json');
$users = json_decode($usersData, true);
require_once __DIR__. "/inc/head.php";

?>

<!DOCTYPE html>
<html>

<style>
    #apercu-compte {
        text-align: center;
        color: #fff;
        font-size: 16px;
    }
    .btn-gestion {
        padding: 10px auto;
        font-size: 16px;
        background: black;
        margin : 10px auto;

    }
        input[type="submit"] {
            border-radius: 12px;
            padding: 10px 10px;
        }
        input[type="submit"]:hover {
            transition: all 0.3s ease-in-out;
            background: #16b95275;
            color: #f1f1f1;
        }
    </style>
<body>
<script src="js/gestion_utilisateur.js"></script>

<?php
require_once __DIR__. "/inc/header.php";?>

    <div  class="wrapper">
    <main class="apercu">
    <section id="apercu-compte" class="block">
        <h1>Gestion des utilisateurs</h1>
    <?php
    


    foreach ($users as $email => $userJsonPath): ?>
        <?php
        // Récupérer les informations de l'utilisateur
        $userData = file_get_contents('php/' . $userJsonPath);
        $user = json_decode($userData, true);
        ?>

        <form method="POST">
            <!-- Afficher les informations de l'utilisateur -->
            <p>Nom d'utilisateur : <?php echo $user['pseudo']; ?></p>
            <p>Email : <?php echo $user['email']; ?></p>


            <!-- Champ caché pour l'email de l'utilisateur -->
            <input type="hidden" name="email" value="<?php echo $user['email']; ?>">

            <!-- Boutons pour signaler rt voir les infosun compte -->
            <input type="submit" name="report" class="btn-gestion ban-button" value="Bannir le compte">
            <input type="submit" name="infoc" class="btn-gestion info-button" value="Voir les  informations">

        </form>
    <?php endforeach; ?>
    </section>
    </main>
    </div>
</body>
</html>