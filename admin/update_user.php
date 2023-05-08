<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "dbucms_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get user input
  $id = $_POST['id'];
  $username = $_POST['username'];
  $role = $_POST['role'];

  // Update user record in database
  $sql = "UPDATE users SET username='$username', role='$role' WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect to user list page
    header("Location: usersdata.php");
    exit();
  } else {
    echo "Error updating user: " . mysqli_error($conn);
  }
} else {
  // Get user ID from URL parameter
  $id = $_GET['id'];

  // Retrieve user record from database
  $sql = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $role = $row['role'];
  } else {
    echo "User not found.";
    exit();
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
</head>
<body>
<div class="container">
  <h1>Update User</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
    <label for="role">Role:</label>
    <select name="role">
      <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
      <option value="card" <?php if ($role == 'card') echo 'selected'; ?>>Card</option>
      <option value="diagnosis" <?php if ($role == 'diagnosis') echo 'selected'; ?>>Diagnosis</option>
      <option value="laboratory" <?php if ($role == 'laboratory') echo 'selected'; ?>>Laboratory</option>
      <option value="pharmacy" <?php if ($role == 'pharmacy') echo 'selected'; ?>>pharmacy</option>
    </select><br><br>
    <input type="submit" name="submit" value="Update">
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
  max-width: 500px;
  margin: 0 auto;
}

label {
  display: inline-block;
  margin-bottom: 0.5rem;
}

input[type="text"], select {
  display: block;
  width: 100%;
  padding: 0.5rem;
  margin-bottom: 1rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 0.25rem;
}

input[type="submit"] {
  display: inline-block;
  padding: 0.5rem 1rem;
  background-color: #007bff;
  color: #fff;
  font-size: 1rem;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0069d9;
}

.error {
  color: red;
  font-size: 0.8rem;
  margin-bottom: 1rem;
}

</style>
</body>
</html>
