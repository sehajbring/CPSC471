<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?> 
<!DOCTYPE html>

<html>

  <head>
    <title>Account</title>
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
              <li><a class="selected"  href="">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a href="staff.html">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="main">
		
 <div id="login">
  <p><h2>Log In</h2></p>
  
  <form action="" method="post">
   <label>UserName :</label>
   <input id="name" name="username" placeholder="username" type="text">
   <p><label>Password :</label>
   <input id="password" name="password" placeholder="**********" type="password"><br><br></p>
   <input name="submit" type="submit" value=" Login ">
   <span><?php echo $error; ?></span>
   </div>
  </form>
  
		<p><li><a href="users.html">New Account</a></li></p>
          <p>Logging in to your account allows you to book parking spaces as well as pay off parking tickets. </p>
          <p> <div class="imgcontainer">
    <img src="car.png" alt="Avatar" class="avatar">
  </div>
</p>
        </div>
      </div>
	  

      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>
  </body>

</html>