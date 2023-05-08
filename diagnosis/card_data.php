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
<h1>Patients data</h1>

<?php
$mrn="";
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

$conn= mysqli_connect("localhost","root","","dbucms_db");

$sql = "SELECT mrn, nof, dor, fname, lname, gname, sex, dob, age, region, sblock, dorm, sub_city, ketena, kebele, id, phone, dep FROM clinic_card";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> <tr> <th> Medical Record Number </th><th> Name of Facility </th> <th>  Date of Registration </th><th> Patient Name </th><th> Patient Father Name </th><th> Patient G.Father Name </th><th> Sex </th><th> Date of Birth </th><th> Age </th><th> Region </th><th> Patient Block </th><th> Patient Dorm </th><th> Sub-city </th><th> Ketena </th><th> Kebele </th><th> Student ID </th><th> Phone Number </th><th> Department </th> <th>Patients Record</th> </tr>';
       while($row = mysqli_fetch_assoc($result)){
           echo '<tr > 
		   <td> ' . $row["mrn"] . '</td>
           <td> ' . $row["nof"] . '</td>
           <td> ' . $row["dor"] . '</td>
           <td>' . $row["fname"] . '</td>
		   <td> ' . $row["lname"] . '</td>
           <td> ' . $row["gname"] . '</td>
           <td> ' . $row["sex"] . '</td>
           <td> ' . $row["dob"] . '</td>
           <td> ' . $row["age"] . '</td>
           <td> ' . $row["region"] . '</td>
           <td> ' . $row["sblock"] . '</td>
           <td> ' . $row["dorm"] . '</td>
           <td> ' . $row["sub_city"] . '</td>
           <td> ' . $row["ketena"] . '</td>
           <td> ' . $row["kebele"] . '</td>
           <td> ' . $row["id"] . '</td>
           <td> ' . $row["phone"] . '</td>
           <td> ' . $row["dep"] . '</td>
        <td><form action="update_card_data.php" method="post">
           <input type="hidden" name="id" value="' . $row["id"] . '">
           <button type="submit">Record</button>
         </form></td>
		   </tr>';

       }
       echo '</table>';
    }
    else
    {
        echo "0 results";
    }
    mysqli_close($conn);
?>



</div>
<?php include 'sidebar.php'; ?>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

table th, table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

table th {
  background-color: #f2f2f2;
}

form {
  display: inline-block;
}

button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}

h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  margin-bottom: 20px;
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
