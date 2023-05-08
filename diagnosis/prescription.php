<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
$congra="";


// Check if form was submitted
if(isset($_POST['submit'])) {
    // Validate form data
    $errors = array();
    if(empty($_POST['patient_mrn'])) {
        $errors[] = "Patient Medical Record Number is required";
    }
    if(empty($_POST['medication'])) {
        $errors[] = "Medication is required";
    }
    if(empty($_POST['dosage'])) {
        $errors[] = "Dosage is required";
    }

    // If no errors, save prescription to database and redirect to medical records page
    if(empty($errors)) {
        $conn = mysqli_connect("localhost", "root", "", "dbucms_db");
        $patient_mrn = mysqli_real_escape_string($conn, $_POST['patient_mrn']);
        $medication = mysqli_real_escape_string($conn, $_POST['medication']);
        $dosage = mysqli_real_escape_string($conn, $_POST['dosage']);
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $sql = "INSERT INTO prescriptions (patient_mrn, medication, dosage, prescribed_by) VALUES ('$patient_mrn', '$medication', '$dosage', '$username')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        $success_message = "Prescription added successfully.";
        header("Location: prescription.php");
        exit();
        $congra="You added patient data successfully.";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescription Page</title>
</head>
<body>
<div class="container">
    <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is the Prescription Page.</p>

    <h2>Create a New Prescription</h2>
    <?php
    echo $congra;
    ?>
<?php
    // Check if success message is set
    if(isset($_SESSION['success_message'])) {
        echo "<p style='color:green'>" . $_SESSION['success_message'] . "</p>";
        unset($_SESSION['success_message']);
    }
    ?>
    <form method="post">
        <label for="patient_mrn">Patient Medical Record Number:</label>
        <input type="text" name="patient_mrn" id="patient_mrn" required><br><br>
        <label for="medication">Medication:</label>
        <input type="text" name="medication" id="medication" required><br><br>
        <label for="dosage">Dosage:</label>
        <input type="text" name="dosage" id="dosage" required><br><br>
        <button type="submit" name="submit">Create Prescription</button>
    </form>
    </div>
<?php include 'sidebar.php'; ?>
<style>
body {
  background-color: #f5f5f5;
  padding: 20px;
}

form {
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 20px;
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

h1, h2 {
  text-align: center;
}

.success-message {
  color: green;
  font-weight: bold;
  margin-bottom: 20px;
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
