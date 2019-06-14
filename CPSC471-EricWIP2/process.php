<?php
	//check username and pass with database
	$username = $POST['username'];
	$password = $POST['password'];
	//prevent sql injections
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	//connect to database
	mysql_connect("localhost","root","");
	mysql_select_db("login");
	
	$result = mysql_query("select * from users where username = '$username' and password = '$password'")
	or die("Failed to query database".mysql_error());
	
	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password ){
		echo "Login granted bitch".$row['username'];
	}else{
		echo "gtfo";
	}
	
?>