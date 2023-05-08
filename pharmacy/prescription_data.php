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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM prescriptions";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Prescription Number</th><th>Patient Name</th><th>Medication</th><th>Dosage</th><th>Prescribed By</th><th>Print PDF</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pre_no"] . "</td>";
        echo "<td>" . $row["patient_name"] . "</td>";
        echo "<td>" . $row["medication"] . "</td>";
        echo "<td>" . $row["dosage"] . "</td>";
        echo "<td>" . $row["prescribed_by"] . "</td>";
        echo '<td>
        <form action="print.php" method="post">
        <input type="hidden" name="id" value="' . $row["id"] . '">
        <button type="submit">Print PDF</button>
    </form>
        </td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No prescriptions found.";
}

mysqli_close($conn);

?>
</div>
<?php include 'sidebar.php'; ?>
<style>
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}
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
</style>
</style>

