<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $utilizador = filter_input(INPUT_POST, 'utilizador', FILTER_DEFAULT);
    $pn = filter_input(INPUT_POST, 'pn', FILTER_DEFAULT);
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);
    $io = filter_input(INPUT_POST, 'io', FILTER_DEFAULT);
    $data = date("Y-m-d h:i:s");
    $sap = 0;

    
    $submit = $mysqli->query("INSERT INTO saidas (data, utilizador, part_number, quantidade, internal_order, sap) VALUES ('$data','$utilizador','$pn','$qty','$io','$sap')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Saida registada!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>