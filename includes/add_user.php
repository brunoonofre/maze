<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';
    sec_session_start();
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $utilizador = filter_input(INPUT_POST, 'utilizador', FILTER_DEFAULT);
    $estatuto = filter_input(INPUT_POST, 'estatuto', FILTER_DEFAULT);
    
    $submit = $mysqli->query("INSERT INTO utilizadores (nome, win_user, cat) VALUES ('$nome','$utilizador','$estatuto')"); 
    
    if($submit){
        $output = json_encode(array('success' => true, 'text' => 'Utilizador registado!'));
        header("Content-Type: application/json", true);
        die($output);
    }else{
        $output = json_encode(array('success' => false, 'text' => 'Erro na insercao dos dados | Error : ('. $mysqli->errno .') '. $mysqli->error));
        header("Content-Type: application/json", true);
        die($output);
    }
?>