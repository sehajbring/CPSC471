<?php
// Include config file
require_once "ticket_config.php";
 
// Define variables and initialize with empty values
$amount = $licence = $confirm_licence = $value = "";
$amount_err = $licence_err = $confirm_licence_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate amount
    if(empty(trim($_POST["amount"]))){
        $amount_err = "Please enter an amount.";
    } else{
		$value = trim($_POST["amount"]);
		if(is_numeric($value) && $value > 0 && $value == round($value, 0)){
			$amount = trim($_POST["amount"]);
		}else{
				$amount_err = "Please use only whole numbers";
			}
		}
    
    // Validate licence
    if(empty(trim($_POST["licence"]))){
        $licence_err = "Please enter a licence.";     
    } elseif(strlen(trim($_POST["licence"])) > 7){
        $licence_err = "licence must have at most 7 characters.";
    } else{
        $licence = trim($_POST["licence"]);
    }
    
    // Validate confirm licence
    if(empty(trim($_POST["confirm_licence"]))){
        $confirm_licence_err = "Please confirm licence.";     
    } else{
        $confirm_licence = trim($_POST["confirm_licence"]);
        if(empty($licence_err) && ($licence != $confirm_licence)){
            $confirm_licence_err = "licence did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($amount_err) && empty($licence_err) && empty($confirm_licence_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO parktic (amount, licence, issued) VALUES (?, ?, current_timestamp)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_amount, $param_licence);
            
            // Set parameters
            $param_amount = $amount;
            $param_licence = $licence; // Creates a licence hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: welcome_staff.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
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
              <li><a href="login.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a class="selected" href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>

    <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                <p><label>Amount:</label>
                <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>"></p>
                <span class="help-block"><?php echo $amount_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($licence_err)) ? 'has-error' : ''; ?>">
                <p><label>Licence:</label>
                <input type="licence" name="licence" class="form-control" value="<?php echo $licence; ?>"></p>
                <span class="help-block"><?php echo $licence_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_licence_err)) ? 'has-error' : ''; ?>">
                <p><label>Confirm Licence:</label>
                <input type="licence" name="confirm_licence" class="form-control" value="<?php echo $confirm_licence; ?>"></p>
                <span class="help-block"><?php echo $confirm_licence_err; ?></span>
            </div>
            <div class="form-group">
			    <input type="reset" class="btn btn-default" value="Reset">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
      </div>
	  </div>
      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>
  </body>

</html>