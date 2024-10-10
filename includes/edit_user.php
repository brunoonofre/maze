<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $utilizador = filter_input(INPUT_POST, 'utilizador', FILTER_DEFAULT);
    $estatuto = filter_input(INPUT_POST, 'estatuto', FILTER_DEFAULT);
        
    $edit = $mysqli->query("UPDATE utilizadores SET nome = '".$nome."', win_user = '".$utilizador."', cat = '".$estatuto."' WHERE id_utilizador = '".$id_utilizador."'");
    
    if($edit){
        $output = json_encode(array('success' => true, 'text' => 'Dados editados com sucesso!'));
        header("Content-Type: applicatlocalizacaon/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na edição de dados! | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: applicatlocalizacaon/json", true);
        die($output);
    }
?>