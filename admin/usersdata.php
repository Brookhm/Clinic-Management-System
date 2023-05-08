<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
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
$conn = mysqli_connect("localhost", "root", "", "dbucms_db");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>User Name</th><th>Role</th><th>Update</th><th>Delete</th></tr>";

  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['role']."</td>";
    echo "<td><form method='get' action='update_user.php'><input type='hidden' name='id' value='".$row['id']."'><input type='submit' name='submit' value='Update'></form></td>";
    echo "<td><form method='post' action='delete_user.php'><input type='hidden' name='id' value='".$row['id']."'><input type='submit' name='submit' value='Delete'></form></td>";    echo "</tr>";
  }
  
  // Close table
  echo "</table>";
} else {
  echo "No data found.";
}

// Close database connection
mysqli_close($conn);
?>
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

table {
  border-collapse: collapse;
  width: 100%;
  background-color: #f9f9f9; /* add your desired background color */
  color: #333; /* add your desired text color */
}

th {
  background-color: #4CAF50; /* add your desired header background color */
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

td, th {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}


</style>
</body>
</html>