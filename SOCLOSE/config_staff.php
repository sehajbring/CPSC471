<?php
// File that connects to the database of users who are staff accounts
//
$link = mysqli_connect('localhost', 'root', '', 'staff_login');

//Checks to see that it has successfully connected to the database
//
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>