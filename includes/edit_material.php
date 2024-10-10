<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_material = filter_input(INPUT_POST, 'id_material', FILTER_DEFAULT);
    $pn = filter_input(INPUT_POST, 'pn', FILTER_DEFAULT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
    $localizacao = filter_input(INPUT_POST, 'localizacao', FILTER_DEFAULT);
        
    $edit = $mysqli->query("UPDATE materiais SET part_number = '".$pn."', descricao = '".$descricao."', localizacao = '".$localizacao."' WHERE id_material = '".$id_material."'");
    
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