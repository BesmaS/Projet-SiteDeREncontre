<?php 
    if(session_status() === PHP_SESSION_NONE) session_start();

    $js = array(
        'js/inscription.js',
    );
    require_once __DIR__. "/inc/head.php";
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <section class="inscription-form">
            <div class="container column">
                <form id="regForm">

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
                                    <button type="button" id="submit-email-button">Suivant</button>
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
                                        <div class="form-header-caption-step">
                                            <span>Étape 
                                                <span class="current-tab-text"></span>
                                                <span> sur 
                                                    <span class="total-tab-text"></span>
                                                </span>
                                            </span>
                                        </div>
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
                                        <label for="inscription-mot-de-passe">Mot de passe <span class="required">*</span></label>
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
                                        <div class="form-header-caption-step">
                                            <span>Étape 
                                                <span class="current-tab-text"></span>
                                                <span> sur 
                                                    <span class="total-tab-text"></span>
                                                </span>
                                            </span>
                                        </div>
                                        <span class="form-header-caption-indication">Créez votre profile</span>
                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-pseudo">Pseudo <span class="required">*</span></label>
                                        <input type="text" id="inscription-pseudo" name="pseudo">
                                    </div>
                                    <div class="input-group">
                                        <label>Sexe <span class="required">*</span></label>
                                        <div class="container column">
                                            <div class="inputs-radio-group">
                                                <input type="radio" id="inscription-sexe" name="sexe">
                                                <label>Homme</label>
                                                <input type="radio" id="inscription-sexe" name="sexe">
                                                <label>Femme</label>
                                            </div>
                                            <div id="inscription-sexe-error"></div>
                                        </div>

                                    </div>
                                    <div class="input-group">
                                        <label for="inscription-date-de-naissance">Date de naissance <span class="required">*</span></label>
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
                                        <div class="form-header-caption-step">
                                            <span>Étape 
                                                <span class="current-tab-text"></span>
                                                <span> sur 
                                                    <span class="total-tab-text"></span>
                                                </span>
                                            </span>
                                        </div>
                                        <span class="form-header-caption-indication">Decrivez votre physique</span>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-taille">Taille</label>
                                        <div class="inputs-number-group">
                                            <input type="number" id="inscription-physique-taille-1" name="physique-taille-1" value="1" min="0" max="2"/>
                                            <span>m</span>
                                            <input type="number" id="inscription-physique-taille-2" name="physique-taille-2" value="60" min="0" max="99"/>
                                        </div>                                        
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-poids">Poids</label>
                                        <div class="inputs-number-group">
                                            <input type="number" id="inscription-physique-poids" name="physique-poids" value="15" min="0"/>
                                            <span>kg</span>
                                        </div>  
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-couleur-cheveux">Couleur des cheveux</label>
                                        <select id="inscription-physique-couleur-cheveux" name="physique-couleur-cheveux">
                                            <option value="noir">Noir</option>
                                            <option value="brun">Brun</option>
                                            <option value="auburn">Auburn</option>
                                            <option value="chatain">Châtain</option>
                                            <option value="roux">Roux</option>
                                            <option value="blond-venitien">Blond vénitien</option>
                                            <option value="blond">Blond</option>
                                        </select>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-couleur-yeux">Couleur des yeux</label>
                                        <select id="inscription-physique-couleur-yeux" name="physique-couleur-yeux">
                                            <option value="bleu">Bleu</option>
                                            <option value="marron">Marron</option>
                                            <option value="gris">Gris</option>
                                            <option value="vert">Vert</option>
                                            <option value="noisette">Noisette</option>
                                        </select>
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
                                        <div class="form-header-caption-step">
                                            <span>Étape 
                                                <span class="current-tab-text"></span>
                                                <span> sur 
                                                    <span class="total-tab-text"></span>
                                                </span>
                                            </span>
                                        </div>
                                        <span class="form-header-caption-indication">Decrivez vos caractéristiques</span>
                                    </div>

                                    <div class="input-group">
                                        <label for="inscription-caracteristique-message-accueil">Ecrivez une message d'accueil</label>
                                        <input type="text" id="inscription-caracteristique-message-accueil" name="caracteristique-message-accueil"/>
                                    </div>

                                    <div class="input-group">
                                        <label for="inscription-caracteristique-citation">Mettez une citation</label>
                                        <input type="text" id="inscription-caracteristique-citation" name="caracteristique-citation"/>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-caracteristique-caractere">Decrivez vos traits de caractère</label>
                                        <textarea id="inscription-caracteristique-centres" name="caracteristique-centres"></textarea>
                                    </div>

                                    <div class="input-group">
                                        <label for="inscription-caracteristique-centres">Parler de vos centres</label>
                                        <textarea id="inscription-caracteristique-centres" name="caracteristique-centres"></textarea>
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
                                        <div class="form-header-caption-step">
                                            <span>Étape 
                                                <span class="current-tab-text"></span>
                                                <span> sur 
                                                    <span class="total-tab-text"></span>
                                                </span>
                                            </span>
                                        </div>
                                        <span class="form-header-caption-indication">Decrivez vos goûts musicaux</span>
                                    </div>


                                    <button type="button" class="tab-next-button"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </section>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>
