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
        
        <main id="inscription-form">
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
                                    <button class="form-button" type="button" id="submit-email-button">Suivant</button>
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
                                    <button type="button" class="tab-next-button form-button"></button>
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
                                            <div class="inputs-radio-group" id="inscription-sexe">
                                                <input type="radio" id="homme" name="sexe">
                                                <label for="homme">Homme</label>
                                                <input type="radio" id="femme" name="sexe">
                                                <label for="femme">Femme</label>
                                            </div>
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
                                    <button type="button" class="tab-next-button form-button"></button>
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
                                            <input type="number" id="inscription-physique-taille-1" name="taille-1" value="1" min="0" max="2"/>
                                            <span>m</span>
                                            <input type="number" id="inscription-physique-taille-2" name="taille-2" value="60" min="0" max="99"/>
                                        </div>                                        
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-poids">Poids</label>
                                        <div class="inputs-number-group">
                                            <input type="number" id="inscription-physique-poids" name="poids" value="15" min="0"/>
                                            <span>kg</span>
                                        </div>  
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-couleur-cheveux">Couleur des cheveux</label>
                                        <select id="inscription-physique-couleur-cheveux" name="couleur-cheveux">
                                            <option value="Noir">Noir</option>
                                            <option value="Brun">Brun</option>
                                            <option value="Auburn">Auburn</option>
                                            <option value="Châtain">Châtain</option>
                                            <option value="Roux">Roux</option>
                                            <option value="Blond vénitien">Blond vénitien</option>
                                            <option value="Blond">Blond</option>
                                        </select>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="inscription-physique-couleur-yeux">Couleur des yeux</label>
                                        <select id="inscription-physique-couleur-yeux" name="couleur-yeux">
                                            <option value="Bleu">Bleu</option>
                                            <option value="Marron">Marron</option>
                                            <option value="Gris">Gris</option>
                                            <option value="Vert">Vert</option>
                                            <option value="Noisette">Noisette</option>
                                        </select>
                                    </div>
                            
                                    <button type="button" class="tab-next-button form-button"></button>
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
                                        <input type="text" id="inscription-caracteristique-message-accueil" name="message-accueil"/>
                                    </div>

                                    <div class="input-group">
                                        <label for="inscription-caracteristique-citation">Mettez une citation</label>
                                        <input type="text" id="inscription-caracteristique-citation" name="citation"/>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label>Decrivez vos traits de caractère</label>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="amical" name="traits[]" value="Amical">
                                            <label for="amical">Amical</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="aventureux" name="traits[]" value="Aventureux">
                                            <label for="aventureux">Aventureux</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="attentionne" name="traits[]" value="Attentionné">
                                            <label for="attentionne">Attentionné</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="ambitieux" name="traits[]" value="Ambitieux">
                                            <label for="ambitieux">Ambitieux</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="creatif" name="traits[]" value="Créatif">
                                            <label for="creatif">Créatif</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="drole" name="traits[]" value="Drôle">
                                            <label for="drole">Drôle</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="empathique" name="traits[]" value="Empathique">
                                            <label for="empathique">Empathique</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="enthousiaste" name="traits[]" value="Enthousiaste">
                                            <label for="enthousiaste">Enthousiaste</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="fiable" name="traits[]" value="Fiable">
                                            <label for="fiable">Fiable</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="honnête" name="traits[]" value="Honnête">
                                            <label for="honnête">Honnête</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="independant" name="traits[]" value="Indépendant">
                                            <label for="independant">Indépendant</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="intelligent" name="traits[]" value="Intelligent">
                                            <label for="intelligent">Intelligent</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="joyeux" name="traits[]" value="Joyeux">
                                            <label for="joyeux">Joyeux</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="ouvert" name="traits[]" value="Ouvert d'esprit">
                                            <label for="ouvert">Ouvert d'esprit</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="passionne" name="traits[]" value="Passionné">
                                            <label for="passionne">Passionné</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="romantique" name="traits[]" value="Romantique">
                                            <label for="romantique">Romantique</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="spontane" name="traits[]" value="Spontané">
                                            <label for="spontane">Spontané</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="sincere" name="traits[]" value="Sincère">
                                            <label for="sincere">Sincère</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="sensible" name="traits[]" value="Sensible">
                                            <label for="sensible">Sensible</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="tolerant" name="traits[]" value="Tolérant">
                                            <label for="tolerant">Tolérant</label>
                                        </div>

                                    </div>

                                    <div class="input-group">
                                        <label for="inscription-caracteristique-centres">Parler de vos centres</label>
                                        <textarea id="inscription-caracteristique-centres" name="centres"></textarea>
                                    </div>

                                    <div class="input-group">
                                        <label>Fumeur ?</label>
                                        <div class="container column">
                                            <div class="inputs-radio-group" id="fumeur">
                                                <input type="radio" id="fumeur-oui" name="fumeur">
                                                <label for="fumeur-oui">Oui</label>
                                                <input type="radio" id="fumeur-non" name="fumeur" checked="checked">
                                                <label for="fumeur-non">Non</label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="tab-next-button form-button"></button>
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

                                    <div class="input-group">
                                        <label>Choissisez vos types de musique favoris</label>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="rock" name="musique[]" value="Rock"><label for="rock">Rock</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="pop" name="musique[]" value="Pop"><label for="pop">Pop</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="rap" name="musique[]" value="Rap"><label for="rap">Rap</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="jazz" name="musique[]" value="Jazz"><label for="jazz">Jazz</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="classique" name="musique[]" value="Classique"><label for="classique">Classique</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="electro" name="musique[]" value="Electro"><label for="electro">Electro</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="reggae" name="musique[]" value="Reggae"><label for="reggae">Reggae</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="country" name="musique[]" value="Country"><label for="country">Country</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="metal" name="musique[]" value="Metal"><label for="metal">Metal</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="folk" name="musique[]" value="Folk"><label for="folk">Folk</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="blues" name="musique[]" value="Blues"><label for="blues">Blues</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="indie" name="musique[]" value="Indie"><label for="indie">Indie</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="alternatif" name="musique[]" value="Alternatif"><label for="alternatif">Alternatif</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="reggaeton" name="musique[]" value="Reggaeton"><label for="reggaeton">Reggaeton</label>
                                        </div>
                                        <div class="input-checkbox-group">
                                            <input type="checkbox" id="punk" name="musique[]" value="Punk"><label for="punk">Punk</label>
                                        </div>
                                    </div>

                                    <button type="button" class="tab-next-button form-button"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </main>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>
