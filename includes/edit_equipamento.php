<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_equipamento = filter_input(INPUT_POST, 'id_equipamento', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $linha = filter_input(INPUT_POST, 'linha', FILTER_DEFAULT);
    $io_corr = filter_input(INPUT_POST, 'io_corr', FILTER_DEFAULT);
    $io_prev = filter_input(INPUT_POST, 'io_prev', FILTER_DEFAULT);
        
    $edit = $mysqli->query("UPDATE equipamentos SET nome = '".$nome."', id_linha = '".$linha."', io_corr = '".$io_corr."', io_prev = '".$io_prev."' WHERE id_equipamento = '".$id_equipamento."'");
    
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