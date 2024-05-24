<?php
    if(session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $messagesFolder = $_SESSION["email"] . "\\messages\\";
        if (!file_exists($messagesFolder)) {
        }
        
        $userMessagesJsonPath = $messagesFolder . $_POST["recever"] . ".json";
        if (!file_exists($userMessagesData)) {
            $userMessages = array();
        }
        else {
            $userMessagesData = file_get_contents($userMessagesJsonPath);
            $userMessages = json_decode($userMessagesData, true);
        }

        $newMessage = array(
            "id" => "",
            "content" => "",
            "date" => ""
        );
    }

    echo 0;
    return;
?>