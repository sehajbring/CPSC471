<?php
include_once 'includes/dbh.inc.php';
if(isset($_GET['tnum'])){
  $t_num = mysqli_real_escape_string ($conn, $_GET['tnum']);
  $sql ="DELETE FROM `parktic` WHERE ticket_id = $t_num";
  $result = mysqli_query ($conn, $sql) or die ("Bad query: $sql");
  header("location: welcome.php");
}
?>


