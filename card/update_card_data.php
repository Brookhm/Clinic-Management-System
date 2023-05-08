<?php
session_start();
// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
$conn= mysqli_connect("localhost","root","","dbucms_db");

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM clinic_card WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
else if(isset($_POST['update'])){
    $mrn=$_POST['mrn'];
    $nof=$_POST['nof'];
    $dor=$_POST['dor'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gname=$_POST['gname'];
    $sex=$_POST['sex'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];
    $region=$_POST['region'];
    $sblock=$_POST['sblock'];
    $dorm=$_POST['dorm'];
    $sub_city=$_POST['sub_city'];
    $ketena=$_POST['ketena'];
    $kebele=$_POST['kebele'];
    $phone=$_POST['phone'];
    $dep=$_POST['dep'];
    $id=$_POST['id'];

    $sql = "UPDATE clinic_card SET mrn='$mrn', nof='$nof', dor='$dor', fname='$fname', lname='$lname', gname='$gname', sex='$sex', dob='$dob', age='$age', region='$region', sblock='$sblock', dorm='$dorm', sub_city='$sub_city', ketena='$ketena', kebele='$kebele', phone='$phone', dep='$dep' WHERE id='$id'";
    mysqli_query($conn, $sql);

    $_SESSION['message'] = "Record updated successfully!";
    header('location: card_data.php');
}
?>
<html>
<head>
	<title>Edit Clinic Card Record</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
            <div class="row">
				<div class="col-sm-8 offset-2">
						<h1 class="">Edit user</h1>
					
					<div class="col-sm-12">
		<?php echo $msg; ?>
		<form method="post" action="">
			<div class="form-group">
				<label for="nof">Number of Facility:</label>
				<input type="text" name="nof" id="nof" value="<?php echo $row['nof']; ?>">
			</div>
			<div class="form-group">
				<label for="dor">Date of Registration:</label>
				<input type="date" name="dor" id="dor" value="<?php echo $row['dor']; ?>">
			</div>
			<div class="form-group">
				<label for="fname">patient Name:</label>
				<input type="text" name="fname" id="fname" value="<?php echo $row['fname']; ?>">
			</div>
			<div class="form-group">
				<label for="lname">Father Name:</label>
				<input type="text" name="lname" id="lname" value="<?php echo $row['lname']; ?>">
			</div>
			<div class="form-group">
				<label for="gname">G.Father Name:</label>
				<input type="text" name="gname" id="gname" value="<?php echo $row['gname']; ?>">
			</div>
			<div class="form-group">
				<label for="sex">Sex:</label>
				<select name="sex" id="sex">
					<option value="Male" <?php if($row['sex']=="Male"){echo "selected";} ?>>Male</option>
					<option value="Female" <?php if($row['sex']=="Female"){echo "selected";} ?>>Female</option>
				</select>
			</div>
			<div class="form-group">
				<label for="dob">Date of Birth:</label>
				<input type="date" name="dob" id="dob" value="<?php echo $row['dob']; ?>">
			</div>
			<div class="form-group">
				<label for="age">Age:</label>
				<input type="text" name="age" id="age" value="<?php echo $row['age']; ?>">
			</div>
			<div class="form-group">
				<label for="region">Region:</label>
				<input type="text" name="region" id="region" value="<?php echo $row['region']; ?>">
			</div>
			<div class="form-group">
				<label for="sblock">Student Block:</label>
				<input type="text" name="sblock" id="sblock" value="<?php echo $row['sblock']; ?>">
			</div>
			<div class="form-group">
				<label for="dorm">Dorm Number:</label>
				<input type="text" name="dorm" id="dorm" value="<?php echo $row['dorm']; ?>">
			</div>
			<div class="form-group">
				<label for="sub_city">Sub-City:</label>
				<input type="text" name="sub_city" id="sub_city" value="<?php echo $row['sub_city']; ?>">
			</div>
			<div class="form-group">
				<label for="kebele">Ketena:</label>
            <input type="text" name="ketena" id="ketena" class="form-control" value="<?php echo $row['ketena'] ?>">
        </div>
			<div class="form-group">
				<label for="kebele">Kebele:</label>
            <input type="text" name="kebele" id="kebele" class="form-control" value="<?php echo $row['kebele'] ?>">
        </div>
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" class="form-control" value="<?php echo $row['id'] ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row['phone'] ?>">
        </div>
        <div class="form-group">
            <label for="dep">Department:</label>
            <input type="text" name="dep" id="dep" class="form-control" value="<?php echo $row['dep'] ?>">
        </div>
        <div class="form-group">
		<input type="submit" class="btn btn-info" value="Update" name="submit">
        </div>
    </form>
	</div>
	</div>
	</div>

</body>
</html>