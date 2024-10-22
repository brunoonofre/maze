<?php
header("Content-Type: text/html; charset=utf-8",true);
include_once 'db_connect.php';
include_once 'functions.php';

$error_msg = "";

if (isset($_POST['nome'], $_POST['n_colaborador'])) {
    // Sanitize and validate the data passed in
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $n_colaborador = filter_input(INPUT_POST, 'n_colaborador', FILTER_DEFAULT);
    $win_user = shell_exec("wmic computersystem get username");
    $bosch_user = trim($win_user, "UserName \r\nEMEA\\");
    $cat = 0;

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT * FROM utilizadores WHERE n_colaborador = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    // check existing ncolaborador  
    if ($stmt) {
        $stmt->bind_param('s', $n_colaborador);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg = "Este nº de colaborador já se encontra registado, verifica senão te enganas-te e/ou pede ajuda a um colega do Maze!";
            //$stmt->close();
        }
        $stmt->close();
    } else {
        $error_msg = "Erro na base de dados!";
        $stmt->close();
    }

    if (empty($error_msg)) {

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO utilizadores (nome, cat, win_user, n_colaborador) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $nome, $cat, $bosch_user, $n_colaborador);
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                $output = json_encode(array('success' => false, 'type' => 'email', 'text' => 'Ocorreu um erro no registo!'));
                header("Content-Type: application/json", true);
                die($output);
            }
        }
        $output = json_encode(array('success' => true, 'type' => 'email', 'text' => 'Registo efectuado com sucesso!'));
        header("Content-Type: application/json", true);
        die($output);
    } else {
        $output = json_encode(array('success' => false, 'type' => 'login', 'text' => $error_msg));
        header("Content-Type: application/json", true);
        die($output);
    }
}
?>