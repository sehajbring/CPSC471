<?php

/*This file uses a similar section of code to the register.php but is connected to the 
staff_login db so it can add users who are staff members*/
//Allows the staff to create other staff members in the staff db
// Include db staff file
require_once "config.php";
 
//Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    //Validates the username 
	//first checks to make sure that the user entered a username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        //Select statement that will then go through the users and later check to 
		//see if any match the one that is inputted
        $sql = "SELECT id FROM users_staff WHERE username = ?";
        
		//make sure inputted username doesnt match existing
        if($stmt = mysqli_prepare($link, $sql)){
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            //set the parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                //if there is an instance in which they match there is an error otherwise the username passes
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        //Close statement
        mysqli_stmt_close($stmt);
    }
    //Validate password
	//similar to username first checks to make sure
	//also adds the restraint that the length of the password has to be above 5
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 5){
        $password_err = "Password must have atleast 5 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    //Validate confirm password
	//continues same checks
	//verifys that the confirm_password is = to the first password entered
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match";
        }
    }
    
    //Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        //query for inserting the username and password values into the database
        $sql = "INSERT INTO users_staff (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            //creates a password has
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            //execute the statement
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

<html>

  <head>
    <title>Add Staff</title>
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
        <h2>Create a Staff Member</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Username:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"></p>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
			
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p><label>Password:</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>"></p>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <p><label>Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"></p>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			
            <div class="form-group">
			    <input type="reset" class="btn btn-default" value="Reset">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
      </div>
	  </div>
      <div id="footer">
        Copyright &copy; 2019 EAB
      </div>
    </div>
  </body>

</html>