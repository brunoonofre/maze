<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $pn = filter_input(INPUT_POST, 'pn', FILTER_DEFAULT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
    $localizacao = filter_input(INPUT_POST, 'localizacao', FILTER_DEFAULT);
    
    $submit = $mysqli->query("INSERT INTO materiais (part_number, descricao, localizacao) VALUES ('$pn','$descricao','$localizacao')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Material registado!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>