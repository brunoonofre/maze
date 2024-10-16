<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $n_colaborador = filter_input(INPUT_POST, 'n_colaborador', FILTER_SANITIZE_NUMBER_INT);
    $ccustos = filter_input(INPUT_POST, 'ccustos', FILTER_SANITIZE_NUMBER_INT);
    $departamento = filter_input(INPUT_POST, 'departamento', FILTER_DEFAULT);
    $tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_DEFAULT);
    $cor = filter_input(INPUT_POST, 'cor', FILTER_DEFAULT);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_NUMBER_INT);
    
    $submit = $mysqli->query("INSERT INTO batas (nome, n_colaborador, centro_custos, departamento, tamanho, cor, quantidade, estado) VALUES ('$nome','$n_colaborador','$ccustos','$departamento','$tamanho','$cor','$quantidade','$estado')"); 

    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Bata pedida com sucesso!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>