<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "dbucms_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM lab_request";
$result = mysqli_query($conn, $query);
?>

<html>
<head>
    <title>Lab Requests</title>
</head>
<body>
<div class="container">
    <center>
    <h2>Lab Requests</h2>
    </center>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Medical Record Number</th>
            <th>Tests Requested</th>
            <th>Take a test</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['request_id']; ?></td>
            <td><?php echo $row['mrn']; ?></td>
            <td><?php echo $row['tests_requested']; ?></td>
            <td><button onclick="location.href='add_laboratory_result.php?request_id=<?php echo $row['request_id']; ?>'">Add Result</button></td>
        </tr>
        <?php } ?>
    </table>
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
}

th {
    background-color: #008080;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
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
</body>
</html>
