<?php 
    $js = array(
        'js/inscription.js',
    );
    require_once __DIR__. "/inc/head.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!file_exists('database')) {
            mkdir('database', 0777, true);
        }

        $usersJsonPath = "\\database\\users.json";
        if (!file_exists($usersJsonPath)) {
            $users = array();
        }
        else{
            $usersData = file_get_contents($usersJsonPath);
            $users = json_decode($usersData, true);
        }

        $email = $_POST['email'];
        if (!array_key_exists($email, $users)){
            
            $newUserDataFolder =  "\\database\\" . $email;
            // Créer le dossier pour l'utilisateur
            if (!is_dir($newUserDataFolder)) {
                mkdir($newUserDataFolder, 0777, true);
            }
            
            $newUserJsonPath = "database\\" . $email . "\\data.json"; // Chemin d'accès au fichier JSON pour l'utilisateur

            $newUser = array(
                "email" => $email,
                "nom" => strtoupper($_POST["nom"]),
                "prenom" => ucfirst($_POST["prenom"]),
                "adresse" => $_POST["adresse"],
                "motDePasse" => password_hash($_POST["mot-de-passe"], PASSWORD_DEFAULT),
                "pseudo" => $_POST["pseudo"],
            );

            $users[$email] = $newUserJsonPath;

            file_put_contents($usersJsonPath, json_encode($users, JSON_PRETTY_PRINT)); // Enregistre le tableau des utilisateurs dans le fichier users.json
            file_put_contents($newUserJsonPath, json_encode($newUser, JSON_PRETTY_PRINT)); // Enregistre les données de l'utilisateur dans le fichier JSON correspondant
            
            header("Location: accueil.php");
        }
    }
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <section class="inscription-form">
            <div class="container column">
                <form id="regForm" action="inscription.php" method="POST">

                    <div class="tab">
                        <div class="container column">
                            <div class="container">
                                <button type="button" class="tab-previous-button">
                                    <span>
                                        <svg>
                                            <path d="M15.957 2.793a1 1 0 0 1 0 1.414L8.164 12l7.793 7.793a1 1 0 1 1-1.414 1.414L5.336 12l9.207-9.207a1 1 0 0 1 1.414 0z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="container column form-inner">
                                    <div class="container column form-header">
                                        <h1>Inscrivez-vous</h1>
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-email">Adresse e-mail</label>
                                        <input type="email" id="inscription-email" name="email" placeholder="nom@domaine.com">
                                    </div>
                                    <button type="button" class="tab-next-button"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="container column">
                            <div class="progress-bar">
                                <div class="progress-bar-fill"></div>
                            </div>
                            <div class="container">
                                <button type="button" class="tab-previous-button">
                                    <span>
                                        <svg>
                                            <path d="M15.957 2.793a1 1 0 0 1 0 1.414L8.164 12l7.793 7.793a1 1 0 1 1-1.414 1.414L5.336 12l9.207-9.207a1 1 0 0 1 1.414 0z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="container column form-inner">
                                    <div class="container column form-header">
                                        <span class="form-header-caption-step">Étape 1 sur </span>
                                        <span class="form-header-caption-indication">Entrez vos infos privés</span>
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-nom">Nom</label>
                                        <input type="text" id="inscription-nom" name="nom">
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-prenom">Prénom</label>
                                        <input type="text" id="inscription-prenom" name="prenom">
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-adresse">Adresse</label>
                                        <input type="text" id="inscription-adresse" name="adresse">
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-mot-de-passe">Mot de passe</label>
                                        <input type="password" id="inscription-mot-de-passe" name="mot-de-passe">
                                    </div>
                                    <button type="button" class="tab-next-button"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab">
                        <div class="container column">
                            <div class="progress-bar">
                                <div class="progress-bar-fill"></div>
                            </div>
                            <div class="container">
                                <button type="button" class="tab-previous-button">
                                    <span>
                                        <svg>
                                            <path d="M15.957 2.793a1 1 0 0 1 0 1.414L8.164 12l7.793 7.793a1 1 0 1 1-1.414 1.414L5.336 12l9.207-9.207a1 1 0 0 1 1.414 0z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="container column form-inner">
                                    <div class="container column form-header">
                                        <span class="form-header-caption-step">Étape 2 sur </span>
                                        <span class="form-header-caption-indication">Créez votre profile</span>
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-pseudo">Pseudo</label>
                                        <input type="text" id="inscription-pseudo" name="pseudo">
                                    </div>
                                    <div class="input-group">
                                        <label>Sexe</label>
                                        <div class="container column">
                                            <div class="container">
                                                <input type="radio" id="inscription-sexe" name="sexe">
                                                <label>Homme</label>
                                                <input type="radio" id="inscription-sexe" name="sexe">
                                                <label>Femme</label>
                                            </div>
                                            <div id="inscription-sexe-error"></div>
                                        </div>

                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-date-de-naissance">Date de naissance</label>
                                        <input type="date" id="inscription-date-de-naissance" name="date-de-naissance">
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-profession">Profession</label>
                                        <input type="text" id="inscription-profession" name="profession">
                                    </div>
                                    <button type="button" class="tab-next-button"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="tab">
                        <div class="container column">
                            <div class="progress-bar">
                                <div class="progress-bar-fill"></div>
                            </div>
                            <div class="container">
                                <button type="button" class="tab-previous-button">
                                    <span>
                                        <svg>
                                            <path d="M15.957 2.793a1 1 0 0 1 0 1.414L8.164 12l7.793 7.793a1 1 0 1 1-1.414 1.414L5.336 12l9.207-9.207a1 1 0 0 1 1.414 0z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="container column form-inner">
                                    <div class="container column form-header">
                                        <span class="form-header-caption-step">Étape 3 sur </span>
                                        <span class="form-header-caption-indication">Decrivez vos caractéristiques</span>
                                    </div>
                                    <h2>Description Physique</h2>
                                    <div class="input-group">
                                        <label for="inscription-physique-taille">Taille</label>
                                        <input type="text" id="inscription-physique-taille" name="physique-taille">
                                    </div>
                                    <h2>Informations personnelles</h2>
                                    <div class="input-group">
                                        <label for="inscription-physique-taille">Centres</label>
                                        <input type="text" id="inscription-physique-taille" name="physique-taille">
                                    </div>
                                    <button type="button" class="tab-next-button"></button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                </form>
            </div>
        </section>
    </div>
</body>
</html>
