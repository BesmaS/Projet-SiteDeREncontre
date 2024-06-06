<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Le dossier de celui qui envoie le message
        $senderMessagesFolder = checkMessageFolder($_SESSION["email"]);
        // Le dossier de celui qui recoit le message
        $receverMessagesFolder = checkMessageFolder($_POST["recever"]);

        $userMessages = array();
        
        // Encode the array back to a JSON string
        $userMessagesJson = json_encode($userMessages, JSON_PRETTY_PRINT);
        
        // Save the JSON string back to the file
        createMessageFile($receverMessagesFolder . $_SESSION["email"] . ".json", $userMessagesJson);
        createMessageFile($senderMessagesFolder . $_POST["recever"] . ".json", $userMessagesJson);

        echo 1;
        exit;
    }

    echo 0;
    exit;

    function checkMessageFolder($user){
        $messagesFolder =  "database\\" . $user . "\\messages\\";
        if (!file_exists($messagesFolder)) {
            mkdir($messagesFolder, 0777, true);
        }

        return $messagesFolder;
    }

    function createMessageFile($file, $json){
        if (!file_exists($file)) {
            file_put_contents($file, $json);
        }
    }
?>