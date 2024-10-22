<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_bota = filter_input(INPUT_POST, 'id_bota', FILTER_DEFAULT);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_NUMBER_INT);
        
    $edit = $mysqli->query("UPDATE botas SET estado = '".$estado."' WHERE id_bota = '".$id_bota."'");
    
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