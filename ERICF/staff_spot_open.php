<?php
include_once 'dbh.inc.php';
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_staff.php");
    exit;
}
$param_id ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $sql = "UPDATE parking_spot SET occupied_flag = 0 WHERE space_id = (?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s",$param_id);
            
            // Set parameters
            $param_id = $_POST["space_id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // username updated successfully. Destroy the session, and redirect to login page
				session_destroy();
                header("location: staff_lots.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
      
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
	    mysqli_close($link);
		}
	
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
		<h2> Open a spot </h2>
        <div id="main">
		<form action="" method="post">
		<p> </p>
		<label>Space id:</label> <input id="name" name="space_id" type="text">
		<input name="submit1" type="submit" value=" submit ">
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
