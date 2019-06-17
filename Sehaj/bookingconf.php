<?php
    include_once 'includes/dbh.inc.php';

    $radio_but = $_POST['radibutton'];
    $licence_num = $_POST['username'];
    $button = $_POST['submit'];

    $sql = "INSERT INTO "

//     if()
//     if (!empty($licence_num)){
//         if(!empty($radio_but)){
            
//         }
//     }

// else{
//     header();
// }
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
			  <li><a href="staff_login.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="main">
        <h3><?php echo $row2['location'] ?></h3>
        <p></p>
        <h3>Floors: <?php echo $row['num_floors'] ?></h3>

		<p> Vehicle size: </p>
		<p> </p>
		<form action="includes/bookingconf.php" method="post">
		<?php
		$sql3 = "SELECT DISTINCT size FROM parking_spot ORDER BY size desc";
		$result3 = mysqli_query ($conn, $sql3) or die ("Bad query: $sql3");
        while($data = mysqli_fetch_array($result3)) {
       echo "<input type='radio' name='radibutton' size='{$data['size']}'>" . $data['size'] . '</br>';
		}
		?>
		<p> </p>
		<label>Licence Plate :</label> <input id="name" name="username" type="text">
		<input name="submit" type="submit" value=" Submit ">
		<p> </p>
   
		</div>
		</form>

		<p> </p>
      <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
         </div>

      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
	  </div>
  </body>

</html>
