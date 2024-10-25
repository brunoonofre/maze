<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_departamento = filter_input(INPUT_POST, 'id_departamento', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        
    $edit = $mysqli->query("UPDATE departamentos SET nome = '".$nome."' WHERE id_departamento = '".$id_departamento."'");
    
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