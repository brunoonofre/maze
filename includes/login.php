<?php
header("Content-Type: text/html; charset=utf-8",true);
include_once 'db_connect.php';
include_once 'functions.php';

$win_user = shell_exec("wmic computersystem get username");
$bosch_user = trim($win_user, "UserName \r\nEMEA\\");

sec_session_start();

if (login($bosch_user, $mysqli) == true) {
    // Login success 
    echo 'success';
    header('Location: ../');
} else {
    // Login failed 
    echo 'fail';
    header('Location: ../index.php?noauth=yes');
}
 
?>