<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_NUMBER_INT);
    $io_consumo = filter_input(INPUT_POST, 'io_consumo', FILTER_SANITIZE_NUMBER_INT);
    $io_moe = filter_input(INPUT_POST, 'io_moe', FILTER_SANITIZE_NUMBER_INT);
    $io_mfe = filter_input(INPUT_POST, 'io_mfe', FILTER_SANITIZE_NUMBER_INT);
    $equipamentos = filter_input(INPUT_POST, 'equipamentos', FILTER_SANITIZE_NUMBER_INT);
    
    $submit = $mysqli->query("INSERT INTO linhas (nome, departamento, io_consumo, io_moe, io_mfe, equipamentos) VALUES ('$nome','$departamento','$io_consumo','$io_moe','$io_mfe','$equipamentos')"); 
    
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