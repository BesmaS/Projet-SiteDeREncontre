<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    date_default_timezone_set("Europe/Paris");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Le dossier de celui qui envoie le message
        $senderMessagesFolder = checkMessageFolder($_SESSION["email"]);
        // Le dossier de celui qui recoit le message
        $receverMessagesFolder = checkMessageFolder($_POST["recever"]);

        // Les messages de l'envoyeur
        $userMessages = getMessages($receverMessagesFolder, $_SESSION["email"]);

        $lastMessage = end($userMessages);
        $lastId = isset($lastMessage['id']) ? $lastMessage['id'] + 1 : 0;
        
        // Create a new message object
        $newMessage = [
            "id" => $lastId,
            "content" => $_POST["newMessage"],
            "recever" => $_POST["recever"],
            "sender" => $_SESSION["email"],
            "date" => date("d-m-Y"),
            "time" => date('H:i:s')
        ];

        // Add the new message to the array
        $userMessages[] = $newMessage;
        
        // Encode the array back to a JSON string
        $userMessagesJson = json_encode($userMessages, JSON_PRETTY_PRINT);
        
        // Save the JSON string back to the file
        file_put_contents($receverMessagesFolder . $_SESSION["email"] . ".json", $userMessagesJson);
        file_put_contents($senderMessagesFolder . $_POST["recever"] . ".json", $userMessagesJson);

        echo json_encode($newMessage);
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

    function getMessages($userMessagesFolder, $user){
        $messagesJsonPath = $userMessagesFolder . $user . ".json";
        if (!file_exists($messagesJsonPath)) {
            $userMessages = array();
        }
        else {
            $userMessagesData = file_get_contents($messagesJsonPath);
            $userMessages = json_decode($userMessagesData, true);
        }

        return $userMessages;
    }
?>