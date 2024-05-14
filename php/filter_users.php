<?php
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
?>