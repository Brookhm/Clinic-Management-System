<?php
session_start();
if($_SESSION['role'] != 'laboratory') {
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laboratory Home Page</title>
    <style>
                body {
            background-image: url("lab_back.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px; /* adjust the width as needed */
        }

        .main-content {
            margin-left: 200px; /* same as the width of the sidebar */
            padding: 20px;
        }
        /* Style for the h1 element */
h1 {
  font-size: 2.5em;
  color: #333;
  margin-bottom: 1em;
}

/* Style for the p element */
p {
  font-size: 1.2em;
  color: #666;
  margin-top: 0;
}

/* Style for the container */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 2em;
  background-color: #f5f5f5;
  border: 1px solid #ddd;
}

    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="container">
  <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
  <p>This is the Laboratory home page.</p>
</div>

</body>
</html>





