<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();

    $io = filter_input(INPUT_POST, 'io', FILTER_SANITIZE_NUMBER_INT);
    
    $output = $mysqli->query("UPDATE saidas SET sap = 1 WHERE internal_order = $io");
    
    $output = json_encode(array('success' => true));
    header("Content-Type: application/json", true);
    die($output);
?>