<?php
	
	$servername="localhost";
	$username="root";
	$password="";
	$database="chatroom";

	// Creating Database Connection

	$conn=mysqli_connect($servername,$username,$password,$database);

	// Check Connection

	if(!$conn)
	{
		die("Failed To Connect".mysqli_connect_error());
	}
?>