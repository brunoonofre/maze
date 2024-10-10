<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_DEFAULT);
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_DEFAULT);
    $lista = filter_input(INPUT_POST, 'lista', FILTER_DEFAULT);
    $data = date("Y/m/d");
    $estado = 1;
    
    $submit = $mysqli->query("INSERT INTO pedidos (id_utilizador, id_linha, data, lista, estado) VALUES ('$id_utilizador','$id_linha','$data','$lista','$estado')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => $mysqli->insert_id));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>