<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    $js = array(
        'js/catalogue.js',
    );
    require_once __DIR__. "/inc/head.php";
?>
<body>
    <div class="wrapper">
        
        <?php include __DIR__. "/inc/header.php"?>
        
        <main id="catalogue">
            
            <section id="catalogue-left-sidebar" class="block">
                <h1>Rechercher</h1>

                <form class="container column">

                    <a class="dropdown-tab" id="recherche-physique"> Physique
                    </a>

                    <div class="dropdown-tab-content" id="recherche-physique-dropdown-tab-content">

                        <div class="input-group">
                            <label for="taille">Taille</label>
                            <div class="inputs-number-group">
                                <input type="number" id="taille-1" name="taille-1" value="1" min="0" max="2"/>
                                <span>m</span>
                                <input type="number" id="taille-2" name="taille-2" value="60" min="0" max="99"/>
                            </div>                                        
                        </div>

                        <div class="input-group">
                            <label for="poids">Poids</label>
                            <div class="inputs-number-group">
                                <input type="number" id="poids" name="poids" value="15" min="0"/>
                                <span>kg</span>
                            </div>  
                        </div>

                        <div class="input-group">
                            <label for="couleur-cheveux">Couleur des cheveux</label>
                            <select id="couleur-cheveux" name="couleur-cheveux">
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
                            <label for="couleur-yeux">Couleur des yeux</label>
                            <select id="couleur-yeux" name="couleur-yeux">
                                <option value="Bleu">Bleu</option>
                                <option value="Marron">Marron</option>
                                <option value="Gris">Gris</option>
                                <option value="Vert">Vert</option>
                                <option value="Noisette">Noisette</option>
                            </select>
                        </div>

                    </div>

                    <a class="dropdown-tab" id="recherche-caracteristique"> Caractéristique
                    </a>

                    <div class="dropdown-tab-content" id="recherche-caracteristique-dropdown-tab-content">
                        <div class="input-group">
                            <label>Traits de caractère</label>
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
                            <label>Fumeur</label>
                            <div class="container column">
                                <div class="inputs-radio-group" id="fumeur">
                                    <input type="radio" id="fumeur-oui" name="fumeur">
                                    <label for="fumeur-oui">Oui</label>
                                    <input type="radio" id="fumeur-non" name="fumeur" checked="checked">
                                    <label for="fumeur-non">Non</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a class="dropdown-tab" id="recherche-musique"> Catégorie de musique
                    </a>

                    <div class="dropdown-tab-content" id="recherche-musique-dropdown-tab-content">

                        <div class="input-group">
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

                    </div>

                    <button class="form-button" type="button" id="recherche-button">Valider</button>
                </form>

                

            </section>
            
            <section id="catalogue-right-sidebar" class="block">
                <h1>Derniers utilisateurs inscrits</h1>
                <div id="user-cards" class="container">
                    <a class="user-card">
                        <div class="block">
                            <img class="profil-picture" src="images/default-profil-picture.png"/>
                        </div>
                        <span class="user-card-pseudo">Pseudo</span>
                    </a>
                    
                </div>
            </section>
            
        </main>
    </div>
<?php 
    require_once __DIR__. "/inc/footer.php";
?>