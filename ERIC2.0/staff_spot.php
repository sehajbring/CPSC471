<?php
    session_start();
    //include('login.php'); // Includes Login Script
// Check if the user is already logged in, if yes then redirect him to welcome page
	//if (isset($_SESSION["loggedin"])){
	//	header("location: login.php");
		//exit;
//}
 
  $sy = $_SESSION["lotId"];
    include_once 'includes/dbh.inc.php';
    if(isset($_GET['ID'])){
        // $id = mysqli_real_escape_string ($conn, $_GET['ID']);
        $sql = "SELECT * FROM parking_lot WHERE lot_id = $sy;";
        $result = mysqli_query ($conn, $sql) or die ("Bad query: $sql");
        $row = mysqli_fetch_array($result);
  
        $sql2 = "SELECT * FROM lot_location WHERE lot_id = $sy;";
        $result2 = mysqli_query ($conn, $sql2) or die ("Bad query: $sql2");
        $row2 = mysqli_fetch_array($result2);
		
    }   
	$space_id = $_POST['space_id'];

	
?>

<!DOCTYPE html>

<html>

  <head>
    <title>Lots</title>
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
              <li><a href="showlots.php">Lots</a></li>
              <li><a href="login.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a class="selected" href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="main">
        <h3><?php echo $row2['location'] ?></h3>
        <p></p>
        <h3>Floors: <?php echo $row['num_floors'] ?></h3>
		<p> </p>
		<form action="" method="post">
		<p> </p>
		<p> Open a spot </p>
		<label>Space id:</label> <input id="name" name="space_id" type="text">
		<input name="submit1" type="submit" value=" submit ">
		<p> Close a spot </p>
		<label>Space id:</label> <input id="name" name="space_id2" type="text">
		<input name="submit2" type="submit" value=" submit ">
		<p> </p>
   
		</div>
		</form>

		<p> </p>
      <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
         </div>

      <div id="footer">
        Copyright &copy; 2019 EAB
      </div>
	  </div>
  </body>

</html>
