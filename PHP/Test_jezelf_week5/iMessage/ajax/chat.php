<?php

    session_start();
    include_once("../classes/Message.class.php");

    $message = new Message();

    if (!empty($_POST['message'])) {
        
        $message->setText($_POST['message']);
        $message->setUser($_SESSION['name']);
        
        try {
            $message->Create();
            $response['text'] = $message->getText();
            $response['user'] = $message->getUser();
        } catch (Exception $e) {
            alert("This isn't working");
        }
        
        header('Content-Type: application/json');
        echo json_encode($response); 
    }

?>