<?php
    include_once 'config.php';
    if(isset($_GET['id'])){
      $ID = mysqli_real_escape_string ($conn, $_GET['id']);
      $sql = "SELECT * FROM parking_lot WHERE lot_id = $ID;";
      $result = mysqli_query ($conn, $sql) or die ("Bad query: $sql");
      $row = mysqli_fetch_array($result);

      $sql2 = "SELECT * FROM lot_location WHERE lot_id = $ID;";
      $result2 = mysqli_query ($conn, $sql2) or die ("Bad query: $sql2");
      $row2 = mysqli_fetch_array($result2);
      session_start();
      $_SESSION['lotId'] = $ID;

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
              <li><a href="lots.php">Lots</a></li>
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

          <p>Total number of spots: <?php echo $row['num_total'] ?></p>
          <p>Total number of available spots: <?php echo $row['num_available'] ?></p>
          <?php
  // ?ids = ?ID;
echo "<a href=staff_spot_open.php?ID = {?row2 ['lot_id']}> Open 	OR		</a>";
echo "<a href=staff_spot.php?ID = {?row2 ['lot_id']}>			Close 			a Spot </a>";
?>
         </div>
      </div>

      <div id="footer">
        Copyright &copy; 2019 EAB
      </div>
    </div>
  </body>

</html>
