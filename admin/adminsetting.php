<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
$username = "";
$password   = "";
$role  ="";
$err= array(); 
$congra="";
$conn= mysqli_connect("localhost","root","","dbucms_db");

if(isset($_POST['add_user'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password= mysqli_real_escape_string($conn, $_POST['password']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);

  
    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { 
      if ($user['username'] === $username) {
        array_push($err, "username already exist!");
       
      }}


  if (count($err) == 0) {
    $query = "INSERT INTO users ( username, password , role) 
          VALUES('$username', '$password' , '$role' )";
    mysqli_query($conn, $query);
      $congra="You are successfully add the user!";
}

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">

    <?php
    echo $congra;
    ?>
<form method="post" action="">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <label for="role">Role:</label>
      <select id="role" name="role">
        <option value="admin">Admin</option>
        <option value="card">Card</option>
        <option value="diagnosis">Diagnosis</option>
        <option value="laboratory">Laboratory</option>
        <option value="pharmacy">Pharmacy</option>

      </select>
      
      <button type="submit" name="add_user">Add User</button>
</form>
</div>
<?php include 'sidebar.php'; ?>
<style>
.container {
  margin-left: 200px;
  padding: 20px;
}

.sidebar {
  float: left;
  width: 200px; 
  margin-right: 20px;
}
.container::after {
  content: "";
  display: table;
  clear: both;
}
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 20px auto;
  max-width: 400px;
}

label {
  margin-top: 10px;
}

input[type="text"],
input[type="password"],
select {
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;
  width: 100%;
  box-sizing: border-box;
}

button {
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  border: none;
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

button:hover {
  background-color: #3e8e41;
}

</style>


</body>
</html>