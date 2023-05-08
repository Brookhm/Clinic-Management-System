<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php


// Connect to database
$db = new mysqli('localhost', 'root', '', 'dbucms_db');
if ($db->connect_error) {
  die('Connection failed: ' . $db->connect_error);
}

// Get user info from database
$stmt = $db->prepare("SELECT username, password FROM users WHERE id=?");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->fetch();
$stmt->close();

// Check if form is submitted
if (isset($_POST['submit'])) {
  $current_username = $_POST['current_username'];
  $current_password = $_POST['current_password'];
  $new_username = $_POST['new_username'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate input
  if (empty($current_username) || empty($current_password) || empty($new_username) || empty($new_password) || empty($confirm_password)) {
    $error = 'Please fill in all fields.';
  } elseif ($current_username !== $username || !password_verify($current_password, $password)) {
    $error = 'Current username or password is incorrect.';
  } elseif ($new_password !== $confirm_password) {
    $error = 'Passwords do not match.';
  } else {
    // Update user info in database
    $stmt = $db->prepare("UPDATE users SET username=?, password=? WHERE id=?");
    $stmt->bind_param("ssi", $new_username, password_hash($new_password, PASSWORD_DEFAULT), $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

    // Update session variables
    $_SESSION['username'] = $new_username;

    // Set success message
    $success = 'Password updated successfully.';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Settings</title>
</head>
<body>
<div class="container">

  <h1>Settings</h1>
  <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
  <?php if (isset($success)) { echo "<p style='color: green;'>$success</p>"; } ?>
  <p>Current Username: <?php echo $username; ?></p>
  <form method="POST">
    <label>Current Username:</label>
    <input type="text" name="current_username"><br>
    <label>Current Password:</label>
    <input type="password" name="current_password"><br>
    <label>New Username:</label>
    <input type="text" name="new_username" value="<?php echo $username; ?>"><br>
    <label>New Password:</label>
    <input type="password" name="new_password"><br>
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password"><br>
    <input type="submit" name="submit" value="Save">
  </form>
  </div>
<?php include 'sidebar.php'; ?>
<style>
  .container {
  margin-left: 200px; /* adjust the value based on your sidebar width */
  padding: 20px;
}

.sidebar {
  float: left;
  width: 200px; /* adjust the value based on your sidebar width */
  margin-right: 20px;
}
.container::after {
  content: "";
  display: table;
  clear: both;
}
form {
  width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-family: Arial, sans-serif;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-sizing: border-box;
  font-size: 16px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.error {
  color: red;
  margin-bottom: 10px;
}

</style>
</body>
</html>
