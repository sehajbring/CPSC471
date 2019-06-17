<?php
include('session.php'); 
if(!isset($_SESSION['login_user'])){ 
  header("location: index.php"); // Redirecting To Home Page 
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Account page</title>
 <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
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
              <li><a href="lots.php">Lots</a></li>
              <li><a class="selected" href="index.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a href="staff.html">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="profile">
 <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
		  <p><a href="lots.php">Book a parking space</a></p>
          <p>How? I'm glad you asked. We all suffer from a very unique condition know as ligma.</p>
		  <a href="parkingtickets.php">Pay parking ticket</a>
		  <p>LIGMA BALLS</p>
		  <p><b id="logout"><a href="logout.php">Log Out</a></b></p>
        </div>
		

      </div>

      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>

</body>
</html>