<?php
    header("Content-Type: text/html; charset=utf-8",true);
    include_once 'db_connect.php';
    include_once 'functions.php';

    sec_session_start();
    
    if (isset($_POST['n_colaborador'], $_POST['p'])) { 
        $n_colaborador = filter_input(INPUT_POST, 'n_colaborador', FILTER_SANITIZE_NUMBER_INT);
        $password = filter_input(INPUT_POST, 'p', FILTER_DEFAULT); // The hashed password.
        
        if (strlen($n_colaborador)!=8) {
            //Numero de colaborador INVALIDO
            $output = json_encode(array('success' => false, 'type' => 'n_colaborador', 'text' => 'Numero de colaborador Invalido!'));
            header("Content-Type: application/json", true);
            die($output);
        }

    
        if (login($n_colaborador, $password, $mysqli) == true) {
            // Login success 
            $output = json_encode(array('success' => true, 'text' => 'blablabla!'));
            header("Content-Type: application/json", true);
            die($output);
        } else {
            // Login failed 
            $output = json_encode(array('success' => false, 'type' => 'login', 'text' => 'Dados de Login Invalidos!'));
            header("Content-Type: application/json", true);
            die($output);
        }
    } else {
        // The correct POST variables were not sent to this page. 
        $output = json_encode(array('success' => false, 'type' => 'login', 'text' => 'Os dados nao foram enviados!'));
        header("Content-Type: application/json", true);
        die($output);
    }
?>