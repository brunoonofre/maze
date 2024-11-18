<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $linha = filter_input(INPUT_POST, 'linha', FILTER_SANITIZE_NUMBER_INT);
    $io_corr = filter_input(INPUT_POST, 'io_corr', FILTER_SANITIZE_NUMBER_INT);
    $io_prev = filter_input(INPUT_POST, 'io_prev', FILTER_SANITIZE_NUMBER_INT);
    
    $submit = $mysqli->query("INSERT INTO equipamentos (nome, id_linha, io_corr, io_prev) VALUES ('$nome','$linha','$io_corr','$io_prev')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Equipamento registado!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>