<?php
include_once 'config.php';
if(isset($_GET['tnum'])){
  $TIC_NUM = mysqli_real_escape_string ($conn, $_GET['tnum']);
  $sql ='DELETE FROM parktic WHERE ticket_id = $TIC_NUM;';
  $result = mysqli_query ($conn, $sql) or die ("Bad query: $sql");
  header("location: welcome.php");
}


