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
              <li><a href="showlots.php">Lots</a></li>
              <li><a class="selected" href="">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a href="staff.html">Staff</a></li>
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

            if ($resultCheck > 0){
                while($column = mysqli_fetch_assoc($result)){
                    echo "<a href = 'parkinglots.php?id={$column['lot_id']}'> {$column['location']} </a> <br> <br> \n";
                }
            }
          ?>
          		  <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
         </div>
      </div>
      

      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>
  </body>

</html>
