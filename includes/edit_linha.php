<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $ccustos = filter_input(INPUT_POST, 'ccustos', FILTER_DEFAULT);
    $io = filter_input(INPUT_POST, 'io', FILTER_DEFAULT);
        
    $edit = $mysqli->query("UPDATE linhas SET nome = '".$nome."', centro_custos = '".$ccustos."', internal_order = '".$io."' WHERE id_linha = '".$id_linha."'");
    
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