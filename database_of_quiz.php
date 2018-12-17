<?php

$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = '';

// create mysqli object

$mysqli = new mysqli($db_host , $db_user , $db_pass , $db_name);

// Error handler
if($mysqli->connect_error){
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}


?>