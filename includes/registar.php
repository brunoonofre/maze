<?php
header("Content-Type: text/html; charset=utf-8",true);
include_once 'db_connect.php';
include_once 'functions.php';

$error_msg = "";

if (isset($_POST['nome'], $_POST['n_colaborador'], $_POST['email'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $n_colaborador = filter_input(INPUT_POST, 'n_colaborador', FILTER_DEFAULT);
    $departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_NUMBER_INT);
    $cat = 0;

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = 'O email inserido nao e valido!';
    }

    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, 'p', FILTER_DEFAULT);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg = "Configuracao de palavra-passe invalida!";
    }       

    // Data validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT * FROM utilizadores WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg = "Este email já se encontra registado, verifica senão te enganas-te e/ou pede ajuda a um colega do Maze!";
            //$stmt->close();
        }
        $stmt->close();
    } else {
        $error_msg = "Erro na base de dados!";
        $stmt->close();
    }

    // check existing username
    $prep_stmt2 = "SELECT id_utilizador FROM utilizadores WHERE n_colaborador = ? LIMIT 1";
    $stmt2 = $mysqli->prepare($prep_stmt2);

    if ($stmt2) {
        $stmt2->bind_param('s', $n_colaborador);
        $stmt2->execute();
        $stmt2->store_result();

        if ($stmt2->num_rows == 1) {
            // A user with this username already exists
            $error_msg = "Nº de colaborador em uso!";
            //                        $stmt2->close();
        }
        $stmt2->close();
    } else {
        $error_msg = "Erro na base de dados!";
        $stmt2->close();
    }

    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        // Create salted password 
        $password = hash('sha512', $password . $random_salt);

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO utilizadores (nome, cat, password, salt, n_colaborador, email, departamento) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sissisi', $nome, $cat, $password, $random_salt, $n_colaborador, $email, $departamento);
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