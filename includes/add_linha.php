<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $ccustos = filter_input(INPUT_POST, 'ccustos', FILTER_SANITIZE_NUMBER_INT);
    $io = filter_input(INPUT_POST, 'io', FILTER_SANITIZE_NUMBER_INT);
    
    $submit = $mysqli->query("INSERT INTO linhas (nome, centro_custos, internal_order) VALUES ('$nome','$ccustos','$io')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Linha registada!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>