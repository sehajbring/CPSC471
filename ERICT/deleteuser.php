<?php
// Initialize the session
 
// Include config file

 require_once "config.php";
// Define variables and initialize with empty values
$new_username = $confirm_username = "";
$new_username_err = $confirm_username_err = "";
$param_username = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new username
    if(empty(trim($_POST["new_username"]))){
        $new_username_err = "Please enter the new username.";     
    } else{
        $new_username = trim($_POST["new_username"]);
    }
    
    // Validate confirm username
    if(empty(trim($_POST["confirm_username"]))){
        $confirm_username_err = "Please confirm the username.";
    } else{
        $confirm_username = trim($_POST["confirm_username"]);
        if(empty($new_username_err) && ($new_username != $confirm_username)){
            $confirm_username_err = "username did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_username_err) && empty($confirm_username_err)){
        // Prepare an update statement
        $sql = "DELETE FROM users WHERE username = (?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s",$param_username);
            
            // Set parameters
            $param_username = $_POST["new_username"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // username updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: welcome_staff.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
              <li><a href="showlots.php">Lots</a></li>
              <li><a href="index.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a class="selected" href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
      </div>

    <div class="wrapper">
        <h2>Delete a Member</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
                <p><label>Enter Username</label>
                <input type="username" name="new_username" class="form-control" value="<?php echo $new_username; ?>"></p>
                <span class="help-block"><?php echo $new_username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_username_err)) ? 'has-error' : ''; ?>">
                <p><label>Confirm Username</label>
                <input type="username" name="confirm_username" class="form-control"></p>
                <span class="help-block"><?php echo $confirm_username_err; ?></span>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="welcome_staff.php">Cancel</a>
				<input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
      <div id="footer">
        Copyright &copy; 2019 EAB
      </div>
    </div>
  </body>

</html>