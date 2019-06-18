<?php
    include_once 'includes/dbh.inc.php';
    $tic_num = $_POST ['tick_num'];
    $licence_pl = $_POST['licence_p'];

    $sql = "SELECT * FROM parktic WHERE parktic.ticket_id = $tic_num;";
    $results = mysqli_query($conn, $sql);
    
    
    ?>


<!DOCTYPE html>

<html>

  <head>
    <title>Tickets</title>
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
              <li><a class="selected"href="welcome.php">Account</a></li>
              <li><a href="about.html">About</a></li>
			  <li><a href="welcome_staff.php">Staff</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div id="main">
</p>
        <?php

        if ( $results-> num_rows == 0){
            echo "Ticket information not found, ticket may have been paid or is not avalible in the system yet.";
        }

        else{
            echo "<br>";
            echo "<table border='1'>";
            while ($row = mysqli_fetch_assoc($results)) {
                echo "<tr>";
                foreach ($row as $field => $value) { 
                    echo "<td>" . $value . "</td>"; 
                }
                echo "</tr>";
            }
        echo "</table>";
        //echo "<a href=ticketpaid.php?tnum = {?row['ticket_id']}> Pay Ticket</a>";
        }
        ?>

</p>

      <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
         </div>
      </div>

      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>
  </body>

</html>
