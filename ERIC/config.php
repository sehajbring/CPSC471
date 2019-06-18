<?php
// File that connects to the database of users who are regular accounts
//
$link = mysqli_connect('localhost', 'root', '', 'login');

//Checks to see that it has successfully connected to the database
//
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>