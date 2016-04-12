<?php

    session_start();
    include_once("../classes/Message.class.php");

    $message = new Message();
    $response = $message->GetAllMessages();
    $response2 = $response->fetchAll();

    header('Content-Type: application/json');
    echo json_encode($response2);

?>