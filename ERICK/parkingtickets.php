<?php
    include_once 'includes/dbh.inc.php';

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
        <form action="tickets2.php" method="POST">
   <label>Ticket Number :</label>
   <input id="ticket_num" name="tick_num" placeholder="Ticket number" type="text">
   <p><label>Licence Plate Number :</label>
   <input id="password" name="licence_p" placeholder="Licence plate" type="text"><br><br></p>
   <input name="submit" type="submit" value=" View Ticket ">
   </div>
  </form>

      <!-- <p><b id="logout"><a href="logout.php">Log Out</a></b></p> -->
         </div>
      

      <div id="footer">
        Copyright &copy; 2019 Ajit Pawa.
      </div>
    </div>
  </body>

</html>
