<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $n_colaborador = filter_input(INPUT_POST, 'n_colaborador', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $estatuto = filter_input(INPUT_POST, 'estatuto', FILTER_DEFAULT);
    $departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_NUMBER_INT);
        
    $edit = $mysqli->query("UPDATE utilizadores SET nome = '".$nome."', n_colaborador = '".$n_colaborador."', email = '".$email."', cat = '".$estatuto."', departamento = '".$departamento."' WHERE id_utilizador = '".$id_utilizador."'");
    
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