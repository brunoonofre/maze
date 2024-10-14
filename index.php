<?php
	header("Content-Type: text/html; charset=utf-8",true);
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    sec_session_start();

    if(isset($_GET['pag'])){
        $pag = filter_input(INPUT_GET, 'pag', FILTER_DEFAULT);
    }else{
        $pag = '';
    }

    if(isset($_GET['noauth'])){
        $log = "failed";
        $pag = "noauth";
    }else{
        if (login_check($mysqli) == true){
            $log = "in";
            $results = $mysqli->query("SELECT * FROM utilizadores WHERE id_utilizador = ".$_SESSION['user_id']);
            $rowuser = $results->fetch_array();

            $cat = $rowuser['cat']*1;
        }else{
            header('Location: includes/login.php');
            $log = "out";
            $pag = "noauth";
        }
    }   
    
    $noauth = "<h2>Não tem autorização para aceder a esta pagina!</h2>";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Maze</title>
        <meta 
            name="viewport" 
            content="width=device-width, initial-scale=1, user-scalable=no">
        <link 
            rel="shortcut icon" 
            type="image/x-icon" 
            href="img/favicon.ico">
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
        <link 
            rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script
			src="https://code.jquery.com/jquery-3.7.1.js"
			integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
			crossorigin="anonymous">
        </script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous">
        </script>
        <link 
            rel="stylesheet" 
            href="css/main.css"/>
    </head>
    <body>
        <section class="header">
            <?php
                include_once 'navbar.php';

                switch ($pag){
                    default:
                        echo '<h2>404 not found</h2>';
                        break;
                    case '':
                        include 'home.php';
                        break;
                    case 'noauth':
                        echo $noauth;
                        break;
                    case 'pedido':
                        include 'pedidos.php';
                        break;
                    case 'materia':
                        include 'material.php';
                        break;
                    case 'linha':
                        include 'linhas.php';
                        break;
                    case 'addpedido':
                        include 'add_pedido.php';
                        break;
                    case 'addmaterial':
                        include 'add_material.php';
                        break;
                    case 'editmaterial':
                            include 'edit_material.php';
                            break;
                    case 'addlinha':
                        include 'add_linha.php';
                        break;
                    case 'editlinha':
                        include 'edit_linha.php';
                        break;
                    case 'pedidoview':
                        include 'pedido_view.php';
                        break;
                    case 'guser':
                        include 'g_user.php';
                        break;
                    case 'adduser':
                        include 'add_user.php';
                        break;
                    case 'edituser':
                        include 'edit_user.php';
                        break;
                    case 'bata':
                        include 'batas.php';
                        break;
                    case 'addbatas':
                        include 'add_batas.php';
                        break;
                }
            ?>
        </section>
    </body>
</html>