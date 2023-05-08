<?php
session_start();
if($_SESSION['role'] != 'admin') {
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home Page</title>
    <style>
                body {
            background-image: url("adminhome.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px; 
        }

        .main-content {
            margin-left: 200px; 
            padding: 20px;
        }
        
h1 {
  font-size: 2.5em;
  color: #333;
  margin-bottom: 1em;
}


p {
  font-size: 1.2em;
  color: #666;
  margin-top: 0;
}


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
  <p>This is the Admin home page.</p>
</div>

</body>
</html>