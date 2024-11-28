<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $departamento = filter_input(INPUT_POST, 'departamento', FILTER_DEFAULT);
    $io_consumo = filter_input(INPUT_POST, 'io_consumo', FILTER_DEFAULT);
    $io_moe = filter_input(INPUT_POST, 'io_moe', FILTER_DEFAULT);
    $io_mfe = filter_input(INPUT_POST, 'io_mfe', FILTER_DEFAULT);
    $equipamentos = filter_input(INPUT_POST, 'equipamentos', FILTER_DEFAULT);
    $vs = filter_input(INPUT_POST, 'vs', FILTER_DEFAULT);
        
    $edit = $mysqli->query("UPDATE linhas SET nome = '".$nome."', departamento = '".$departamento."', io_consumo = '".$io_consumo."', io_moe = '".$io_moe."', io_mfe = '".$io_mfe."', equipamentos = '".$equipamentos."', vs = '".$vs."' WHERE id_linha = '".$id_linha."'");
    
    if($edit){
        $output = json_encode(array('success' => true, 'text' => 'Dados editados com sucesso!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na edição de dados! | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>