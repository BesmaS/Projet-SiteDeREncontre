<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $prenom = $_POST["prenom"];
        $birthday = $_POST["daten"];
        $email = $_POST["email"];

        $infoUtilisateur = "$nom; $prenom; $birthday; $email\n";

        $filename = "connexion.txt";
        $file = fopen($filename, "a") or die("Unable to open file!"); 
        fwrite($file, $infoUtilisateur);
        fclose($file);

        echo "<p>Compte cree avec succés</p>";

    } else {
        echo "<p>Error: Form data not received.</p>";
    }
    ?>
