<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "dbucms_db";
    $connection = mysqli_connect($host, $user, $password, $database);
    
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    if(empty($username) || empty($password)) {
        echo "Please enter all fields.";
    } else {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            
            switch($row['role']) {
                case 'pharmacy':
                    header("location: pharmacy/pharmacy_home.php");
                    break;
                case 'card':
                    header("location: card/card_home.php");
                    break;
                case 'admin':
                    header("location: admin/admin_home.php");
                    break;
                case 'diagnosis':
                    header("location: diagnosis/diagnosis_home.php");
                    break;
                case 'laboratory':
                    header("location: laboratory/laboratory_home.php");
                    break;
                default:
                    echo "Invalid user role.";
                    break;
            }
        } else {
            echo "Invalid username or password.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>




    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-sizing: border-box;
}

input[type="submit"] {
  background-color: #43B3B1;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input[type="submit"]:hover {
  transform: translateY(-5px);
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
}

    </style>
</body>
</html>
