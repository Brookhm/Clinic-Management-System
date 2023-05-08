<?php
session_start();
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "dbucms_db";  
$connection = mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_error()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
    exit();
}
?>
