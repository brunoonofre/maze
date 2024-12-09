<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    $output = $mysqli->query("UPDATE saida_pedidos SET sap = 1 WHERE id_saida_pedido = $id");
    
    $output = json_encode(array('success' => true));
    header("Content-Type: application/json", true);
    die($output);
?>