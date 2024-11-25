<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    
    $output = $mysqli->query("UPDATE saidas SET sap = 1 WHERE sap = 0");
    
    $output = json_encode(array('success' => true));
    header("Content-Type: application/json", true);
    die($output);
?>