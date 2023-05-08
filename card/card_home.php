<?php
session_start();
if($_SESSION['role'] != 'card') {
    header("location: ../login.php");
    exit;
}
?>

<?php
$err ="";
$msg="";
$conn= mysqli_connect("localhost","root","","dbucms_db");

$nof = "";
$dor ="";
$fname ="";
$lname ="";
$gname ="";
$sex ="";
$dob ="";
$age ="";
$region ="";
$sblock ="";
$dorm ="";
$sub_city ="";
$ketena ="";
$kebele ="";
$id ="";
$phone ="";
$dep ="";
$err= array(); 
$congra="";

if(isset($_POST['add_card'])){
  $nof = mysqli_real_escape_string($conn, $_POST['nof']);
  $dor = mysqli_real_escape_string($conn, $_POST['dor']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $gname = mysqli_real_escape_string($conn, $_POST['gname']);
  $sex = mysqli_real_escape_string($conn, $_POST['sex']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $region = mysqli_real_escape_string($conn, $_POST['region']);
  $sblock = mysqli_real_escape_string($conn, $_POST['sblock']);
  $dorm = mysqli_real_escape_string($conn, $_POST['dorm']);
  $sub_city = mysqli_real_escape_string($conn, $_POST['sub_city']);
  $ketena = mysqli_real_escape_string($conn, $_POST['ketena']);
  $kebele = mysqli_real_escape_string($conn, $_POST['kebele']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $dep = mysqli_real_escape_string($conn, $_POST['dep']);

  if (count($err) == 0) {
      $query = "INSERT INTO clinic_card ( nof, dor, fname, lname, gname, sex, dob, age, region, sblock, dorm, sub_city, ketena, kebele, id, phone, dep) 
            VALUES('$nof','$dor','$fname','$lname','$gname','$sex','$dob','$age','$region','$sblock','$dorm','$sub_city','$ketena','$kebele','$id','$phone','$dep' )";
      mysqli_query($conn, $query);
        
        $congra="You added patient data successfully.";
}}
?>  
		
<html>
  <head>
	<title> </title>
  <title>Card Home Page</title>
</head>
<body>
</head>
<body>
<div class="container">
	<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
	<p>This is the Card home page.</p>
    <?php
    echo $congra;
    ?>
    <form action="card_home.php"  method="post" >
    <label>Name of Facility</label>
      <input type="text" name="nof" class="noflist" placeholder="Enter Name of facility"required>
      <label>Date of Registration </label> 
      <input type="date" name="dor" class="regdate" placeholder="Enter Date of Registration"required>
      <label>Patient Name </label>  
      <input type="text" name="fname" class="fnamelist" placeholder="Enter Patient Name "required>
      <label>Patient Father Name</label>
      <input type="text" name="lname" class="lnamelist" placeholder="Enter Patient Father Name "required>
      <label>Patient G.Father Name</label>
      <input type="text" name="gname" class="gnamelist" placeholder="Enter Patient G.Father Name"required>
      
      <label>Select Sex</label>
      <input type="radio" name="sex" id="" value="Male"required>Male
      <input type="radio" name="sex" id="" value="Female"required>Female 
      <label>Date of Birth</label>
      <input type="date" name="dob" class="birdate" placeholder="Enter Date of Birth"required>
      <label>Age</label>
      <input type="int" name="age" class="agee" placeholder="Enter Age"required>
      <label>Region</label>
      <input type="text" name="region" class="pregion" placeholder="Enter Region"required>
      <label>Patient Block</label>
      <input type="int" name="sblock" class="psblock" placeholder="Enter Dorm Block"required>
      <label>Patient Dorm</label>
      <input type="int" name="dorm" class="pdorm" placeholder="Enter Dorm Number"required>
      <label>Sub-City</label>
      <input type="text" name="sub_city" class="subcity" placeholder="Enter Living Sub-city"required>
      <label>Ketena</label>
      <input type="int" name="ketena" class="pketena" placeholder="Enter Living Ketena"required>
      <label>Kebele</label>
      <input type="int" name="kebele" class="pkebele" placeholder="Enter Living kebele"required>
      <label>Student ID</label>
      <input type="int" name="id" class="sid" placeholder="Enter Student ID"required>
      <label>Phone Number</label>
      <input type="int" name="phone" class="pphone" placeholder="Enter Phone Number"required>
      <label>Department</label>
      <input type="text" name="dep" class="pdep" placeholder="Enter Date of Department"required><br>
      <input type="submit" name="add_card" class="submitbtn" value="ADD CARD">
    </form>
	</div>




  </div>
<?php include 'sidebar.php'; ?>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #f2f2f2;
}

h1, h2 {
  text-align: center;
  margin: 20px 0;
}

p {
  text-align: center;
  margin-bottom: 20px;
}

.box2 {
  margin: 0 auto;
  max-width: 800px;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.noflist, .regdate, .fnamelist, .lnamelist, .gnamelist, .birdate, .agee, .pregion, .psblock, .pdorm, .subcity, .pketena, .phone, .dep {
  display: block;
  width: 100%;
  margin: 10px 0;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.homebtn {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 0;
  border-radius: 5px;
  cursor: pointer;
}

.homebtn:hover {
  background-color: #3e8e41;
}

form label {
  display: block;
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 5px;
}

form input[type="radio"] {
  margin-right: 10px;
}

form button[type="submit"] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 0;
  border-radius: 5px;
  cursor: pointer;
}

form button[type="submit"]:hover {
  background-color: #3e8e41;
}
.submitbtn {
  background-color: #4CAF50; /* Change the background color to your desired color */
  border: none; /* Remove the border */
  color: white; /* Change the text color to white */
  padding: 10px 20px; /* Add padding to the button */
  text-align: center; /* Center the text */
  text-decoration: none; /* Remove any text decoration */
  display: inline-block; /* Display the button as an inline-block element */
  font-size: 16px; /* Set the font size */
  margin: 10px; /* Add margin to the button */
  cursor: pointer; /* Add a pointer cursor on hover */
  border-radius: 5px; /* Add rounded corners to the button */
  transition: background-color 0.3s ease-in-out; /* Add a smooth transition effect */
}

.submitbtn:hover {
  background-color: #3e8e41; /* Change the background color on hover */
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
