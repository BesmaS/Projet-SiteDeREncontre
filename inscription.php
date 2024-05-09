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
        
        <section class="inscription-form">
            <div class="container column">
                <form>
                    <div class="tab">
                        <button type="button" class="tab-previous-button"></button>
                        <h1>Inscrivez vous</h1>
                        <div class="input-group">
                            <label for="inscription-email">Adresse e-mail</label>
                            <input type="text" id="inscription-email" name="email">
                        </div>
                    </div>
                    
                    <div class="tab">
                        <div class="container column">
                            <div class="progress-bar">
                                <div class="progress-bar-fill" id="etape-1"></div>
                            </div>
                            <div class="container">
                                <button type="button" class="tab-previous-button">
                                    <span>
                                        <svg>
                                            <path d="M15.957 2.793a1 1 0 0 1 0 1.414L8.164 12l7.793 7.793a1 1 0 1 1-1.414 1.414L5.336 12l9.207-9.207a1 1 0 0 1 1.414 0z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="container column form-header-caption">
                                    <span class="form-header-caption-step">Étape 1 sur </span>
                                    <span class="form-header-caption-indication">Créez votre profile</span>
                                </div>
                            </div>
                            <div class="inputs-group">
                                <div class="input-group">
                                    <label for="inscription-pseudo">Pseudo</label>
                                    <input type="text" id="inscription-pseudo" name="pseudo">
                                </div>
                                <div class="input-group">
                                    <label>Sexe</label>
                                    <div class=container>
                                        <input type="radio" id="inscription-sexe" name="sexe">
                                        <label for="inscription-sexe">Homme</label>
                                        <input type="radio" id="inscription-sexe" name="sexe">
                                        <label for="inscription-sexe">Femme</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="inscription-pseudo">Date de naissance</label>
                                    <input type="text" id="inscription-pseudo" name="pseudo">
                                </div>
                                <div class="input-group">
                                    <label for="inscription-profession">Profession</label>
                                    <input type="text" id="inscription-profession" name="profession">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab">
                        <div class="container column">
                            <div class="progress-bar">
                                <div class="progress-bar-fill" id="etape-2"></div>
                            </div>
                            <div class="container">
                                <button type="button" class="tab-previous-button">
                                    <span>
                                        <svg>
                                            <path d="M15.957 2.793a1 1 0 0 1 0 1.414L8.164 12l7.793 7.793a1 1 0 1 1-1.414 1.414L5.336 12l9.207-9.207a1 1 0 0 1 1.414 0z"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="container column form-header-caption">
                                    <span class="form-header-caption-step">Étape 2 sur </span>
                                    <span class="form-header-caption-indication">Decrivez vos caractéristiques</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="tab-next-button">Suivant</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>