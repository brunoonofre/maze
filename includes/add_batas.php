<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $admissao = filter_input(INPUT_POST, 'admissao', FILTER_SANITIZE_NUMBER_INT);
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $n_colaborador = filter_input(INPUT_POST, 'n_colaborador', FILTER_SANITIZE_NUMBER_INT);
    $ccusto = filter_input(INPUT_POST, 'ccusto', FILTER_SANITIZE_NUMBER_INT);
    $tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_DEFAULT);
    $cor = filter_input(INPUT_POST, 'cor', FILTER_DEFAULT);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_NUMBER_INT);
    $data = date("Y/m/d");
    
    $stmt = $mysqli->prepare("INSERT INTO batas (id_utilizador, nome, n_colaborador, centro_custo, tamanho, cor, quantidade, estado, data, admissao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
    $stmt->bind_param('isiissiisi', $id_utilizador, $nome, $n_colaborador, $ccusto, $tamanho, $cor, $quantidade, $estado, $data, $admissao);
    $stmt->execute();

    if($stmt){
        $output = json_encode(array('success' => true, 'text' => 'Bata pedida com sucesso!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>