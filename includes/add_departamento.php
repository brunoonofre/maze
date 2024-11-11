<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $ccusto = filter_input(INPUT_POST, 'ccusto', FILTER_DEFAULT);
    
    $submit = $mysqli->query("INSERT INTO departamentos (nome, centro_custo) VALUES ('$nome','$ccusto')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Departamento registado!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>