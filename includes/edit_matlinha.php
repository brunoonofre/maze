<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_material = filter_input(INPUT_POST, 'id_material', FILTER_DEFAULT);
    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_DEFAULT);
    $add = filter_input(INPUT_POST, 'add', FILTER_DEFAULT);

    $check = $mysqli->query("SELECT * FROM material_linha WHERE id_linha = $id_linha AND id_material = $id_material");
    $rowcheck = $check->num_rows;

    if($add==1 && $rowcheck == 0){
        $edit = $mysqli->query("INSERT INTO material_linha (id_material, id_linha) VALUES ('$id_material','$id_linha')");
    }else if($add==0){
        $edit = $mysqli->query("DELETE FROM material_linha WHERE id_linha = $id_linha AND id_material = $id_material");
    }
        
    
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