<?php
session_start();

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
    <title>Lab Result</title>
</head>
<body>
<div class="container">
    <center>
    <h2>Lab Results</h2>
    </center>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Medical Record Number</th>
            <th>Tests Requested</th>
            <th>Result</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['request_id']; ?></td>
            <td><?php echo $row['mrn']; ?></td>
            <td><?php echo $row['tests_requested']; ?></td>
            <td>
                <?php
                $request_id = $row['request_id'];
                $result_query = "SELECT result FROM lab_result WHERE request_id = '$request_id'";
                $result_result = mysqli_query($conn, $result_query);
                $result_row = mysqli_fetch_assoc($result_result);
                echo $result_row['result'];
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>
        </div>
        <?php include 'sidebar.php'; ?>

    <style>
table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

form {
    display: inline-block;
}

input[type=text] {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type=submit] {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button[type=submit]:hover {
    background-color: #3e8e41;
}
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

    </style>
</body>
</html>
