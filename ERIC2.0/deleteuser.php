<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = "";
$username_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
        if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
       
		$username = $_POST["username"];
        $sql = "DELETE FROM users WHERE username = $username";
        
		}
	
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>

<html>

  <head>
    <title>Delete User</title>
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
              <li><a href="staff_lots.php">Lots</a></li>
              <li><a href="login.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a class="selected" href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>

    <div class="wrapper">
        <h2>Delete a Member</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Username:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"></p>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-primary" value="Submit">
            </div>
        </form>
      </div>
	  </div>
      <div id="footer">
        Copyright &copy; 2019 Ligma.
      </div>
    </div>
  </body>

</html>