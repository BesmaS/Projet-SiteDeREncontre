<?php
    // filter_users.php
    // Filtre les utilisateurs selon les préférences choisis
    // Utilisé pour catalogue.php

    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userJsonPath = $_POST["userJsonPath"];
        if (file_exists($userJsonPath)){

            // Ouvrir le fichier json
            $userData = json_decode(file_get_contents($userJsonPath), true);

            parse_str($_POST['searchFormData'], $searchFormData);

            // Physique

            compareValues($userData["poids"], $searchFormData["poids"], "<=");
            compareStrings($userData["couleur-cheveux"], $searchFormData["couleur-cheveux"]);
            compareStrings($userData["couleur-yeux"], $searchFormData["couleur-yeux"]);

            // Caractéristique
            
            compareStrings($userData["fumeur"], $searchFormData["fumeur"]);
            
            //Cathégories 

            containsStrings($userData["musiques"], $searchFormData["musiques"]);

            echo json_encode($userData, JSON_PRETTY_PRINT);
            exit;
        }
    }

    echo 0;
    exit;

    function compareValues($value1, $value2, $comparator) {
        $result = true;
        
        switch ($comparator) {
            case '==':
                $result = $value1 == $value2;
                break;
            case '!=':
                $result = $value1 != $value2;
                break;
            case '>':
                $result = $value1 > $value2;
                break;
            case '>=':
                $result = $value1 >= $value2;
                break;
            case '<':
                $result = $value1 < $value2;
                break;
            case '<=':
                $result = $value1 <= $value2;
                break;
            default:
                exit;
        }
        
        if (!$result) {
            echo 0;
            exit;
        }
        
        return;
    } 
    
    function compareStrings($string1, $string2){
        if (strcasecmp($string1, $string2) !== 0) {
            echo 0;
            exit;
        }
    }


    // returns 0 if element is not in the array
    function elemInArray($string, $stringList){
        $longueur_list = count($stringList);
        for ($i = 0; $i < $longueur_list; $i++) {
            if (strcasecmp($string, $stringList[$i]) !== 0) {
                return 1;
            }
        }
        return 0;
    }

    // Check if each elements in stringList1 is in stringList2
    // returns 1 if the first list is in the second one 
    function containsStrings($stringList1, $stringList2){
        $longueur = count($stringList1);
        for ($i = 0; $i < $longueur; $i++) {
            if (elemInArray($stringList1[$i], $stringList2) == 0) {
                echo 0;
                exit;
            }
        }
        return 1;
    }
    
?>
