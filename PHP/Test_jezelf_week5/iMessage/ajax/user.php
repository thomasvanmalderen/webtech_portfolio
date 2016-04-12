<?php
    session_start();

    $name['name'] = $_SESSION['name'];
    header('Content-Type: application/json');
    echo json_encode($name);

?>