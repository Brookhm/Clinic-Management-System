<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "root", "", "dbucms_db");
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: usersdata.php");
    exit();
}
?>
