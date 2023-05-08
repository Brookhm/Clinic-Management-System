<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
$err ="";
$msg="";
$conn= mysqli_connect("localhost","root","","dbucms_db");
$mrn = "";
$tests_requested ="";
$err= array(); 
$congra="";
if(isset($_POST['add_request'])){
    $mrn = mysqli_real_escape_string($conn, $_POST['mrn']);
    $tests_requested = mysqli_real_escape_string($conn, $_POST['tests_requested']);
    if (count($err) == 0) {
        $query = "INSERT INTO lab_request ( mrn, tests_requested) 
              VALUES('$mrn','$tests_requested' )";
        mysqli_query($conn, $query);
          
          $congra="Your Lab Request Sent successfully.";
  }}
  ?> 

<html>
  <head>
	<title> </title>
  <title>Card Home Page</title>
</head>
<body>
<div class="container">
    <div class="box2">
    <h2>Add Patient Lab Request Here:</h2>
    <?php
    echo $congra;
    ?>
    <form action="add_laboratory_request.php"  method="post" >
      <label>Medical Record Number</label>
      <input type="int" name="mrn" class="pphone" placeholder="Enter Medical Record Number"required><br>
      <label>Tests Requested:</label>
      <input type="text" name="tests_requested" class="pdep" placeholder="Enter Tests Requested "required>

      <input type="submit" name="add_request" class="submitbtn" value="add_request">
    </form>
	</div>

  </div>
<?php include 'sidebar.php'; ?>
  <style>
    .box2 {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 2px solid #ccc;
  background-color: #f2f2f2;
}

.box2 h2 {
  margin-top: 0;
  font-size: 24px;
  text-align: center;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="int"],
input[type="text"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.submitbtn {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  margin-top: 20px;
}

.submitbtn:hover {
  background-color: #45a049;
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
<body>
</html>
