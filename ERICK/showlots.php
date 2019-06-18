<?php
    include_once 'includes/dbh.inc.php';
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
              <li><a class="selected" href="">Lots</a></li>
              <li><a href="login.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a href="login_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="main">
          <h2>Lots</h2>
          <p><b>Availible Lots</b></p>
          <?php
            $sql = "SELECT * FROM  lot_location;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
			
			$sql2 = "SELECT * FROM parking_lot;";
			$result2= mysqli_query ($conn, $sql2);
			

            if ($resultCheck > 0){
                while(($column = mysqli_fetch_assoc($result)) && ($column2 = mysqli_fetch_assoc($result2))){
                    echo "{$column['location']}";
					echo "Occupancy: {$column2['num_available']} <br> <br> \n";
                }
            }
          ?>
          		  <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
         </div>
      </div>
      

      <div id="footer">
        Copyright &copy; 2019 EAB.
      </div>
    </div>
  </body>

</html>
