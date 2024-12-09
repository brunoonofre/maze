<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_pedido = filter_input(INPUT_POST, 'id_pedido', FILTER_DEFAULT);
    $io = filter_input(INPUT_POST, 'io', FILTER_DEFAULT);
    $lista = filter_input(INPUT_POST, 'lista', FILTER_DEFAULT);
    $sap = 0;
    
    $submit = $mysqli->query("INSERT INTO saida_pedidos (id_pedido, io, lista, sap) VALUES ('$id_pedido','$io','$lista','$sap')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => $mysqli->insert_id));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>