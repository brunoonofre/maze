<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $id_pedido = filter_input(INPUT_POST, 'id_pedido', FILTER_SANITIZE_NUMBER_INT);
    $id_utilizador = filter_input(INPUT_POST, 'id_utilizador', FILTER_SANITIZE_NUMBER_INT);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_DEFAULT);
    $data = date("Y/m/d");

    $submit = $mysqli->query("INSERT INTO notas (id_pedido, id_utilizador, nota, data) VALUES ('$id_pedido','$id_utilizador','$nota','$data')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Nota registada!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>