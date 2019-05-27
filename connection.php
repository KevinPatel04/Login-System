<?php
	
	$DB_Host = "localhost";    // Database hostname
	$DB_Username = "root";	   // Database username
	$DB_Password = "";		   // Database Password
	$DB_Name = "loginsystem";    // Database name

	$conn=mysqli_connect($DB_Host,$DB_Username,$DB_Password,$DB_Name);
	if(!$conn){
		header("location: https://httpstat.us/404");
	}

?>