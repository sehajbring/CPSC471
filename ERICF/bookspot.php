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
    
    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";

// } 
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate new password
  if(empty(trim($_POST["new_password"]))){
      $new_password_err = "Please enter the licence plate.";     
  } elseif(strlen(trim($_POST["new_password"])) > 7){
      $new_password_err = "Licence plate must be less then 7 characters.";
  } else{
      $new_password = trim($_POST["new_password"]);
  }

  // Check input errors before updating the database
  if(empty($new_password_err) && empty($confirm_password_err)){
      // Prepare an update statement
      $sql3 = "UPDATE parking_spot SET occupied_flag= 1,licence_plate = ? WHERE occupied_flag = 0 AND lot_id = $sy LIMIT 1";
      
      if($stmt = mysqli_prepare($conn, $sql3)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s",$new_licence);
          
          // Set parameters
        $new_licence = $new_password;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Password updated successfully. Destroy the session, and redirect to login page
              session_destroy();
              header("location: lots.php");
              exit();
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }
      
      // Close statement
      mysqli_stmt_close($stmt);
  }
  
  // Close connection
  mysqli_close($conn);
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
              <li><a class="selected" href="login.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="main">
        <h3><?php echo $row2['location'] ?></h3>
        <p></p>
        <h3>Floors: <?php echo $row['num_floors'] ?></h3>
		<p> </p>
   
		</div>    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <p><label>Licence Plate:</label>
                <input type="text" name="new_password" class="form-control" value="<?php echo $new_password; ?>"></p>
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="lots.php">Cancel</a>
				<input type="submit" class="btn btn-primary" value="Submit">
            </div>

		<p> </p>
      <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
        
		  </div>
      <div id="footer">
        Copyright &copy; 2019 EAB
      </div>

	  </div>
  </body>

</html>
