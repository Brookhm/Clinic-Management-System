<?php
require_once('tcpdf/tcpdf.php');

// Get the prescription ID from the POST request
$prescription_id = $_POST['id'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dbucms_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the prescription details from the database
$sql = "SELECT * FROM prescriptions WHERE id = $prescription_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);

// Create a new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set the document information
$pdf->SetCreator('UCMS');
$pdf->SetAuthor($row['prescribed_by']);
$pdf->SetTitle('Prescription Details');
$pdf->SetSubject('Prescription Details');
$pdf->SetKeywords('Prescription, Medication, Dosage');

// Add a page
$pdf->AddPage();

// Set the font and font size
$pdf->SetFont('times', '', 12);

// Add the prescription details to the PDF document
$pdf->Write(0, 'Prescription Number: ' . $row['pre_no'] . "\n", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Patient Name: ' . $row['patient_name'] . "\n", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Medication: ' . $row['medication'] . "\n", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Dosage: ' . $row['dosage'] . "\n", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Prescribed By: ' . $row['prescribed_by'] . "\n", '', 0, 'L', true, 0, false, false, 0);

// Output the PDF document to the browser
$pdf->Output('Prescription Details.pdf', 'I');
?>
