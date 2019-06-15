<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>

<html>

  <head>
    <title>About</title>
  </head>

  <body>
    <div id="container">

      <div id="header">
        <h1>Parking Application</h1>
        <link rel="stylesheet" type="text/css" href="design.css" />
      </div>

      <div id="content">
        <div id="nav">
          <h3>Menu</h3>
            <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="lots.html">Lots</a></li>
              <li><a href="login.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a class="selected" href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>


      </div>

 
</head>
<body>
    <div class="page-header">
        <h1>Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    </div>
	<p><a href="staff.html">Modify a parking space</a></p>
	<p><a href="staff.html">Issue a ticket</a></p>
    <p>
	<a href="reset-password_staff.php" class="btn btn-warning">Reset Your Password</a>
    <center><p><b><a href="logout_staff.php" class="btn btn-danger" class="selected" >Log Out</a></b></p></center>
    </p>
     <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>
  </body>

</html>
