<?php
header("Content-Type: text/html; charset=utf-8",true);

include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();

$bosch_user = getenv("REMOTE_ADDR");


if (login($bosch_user, $mysqli) == true) {
    // Login success 
    header('Location: ../');
} else {
    // Login failed 
    header('Location: ../index.php?noauth=yes');
}
 
?>