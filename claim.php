<?php

	$room=$_POST['room'];

	if(strlen($room)>20 or strlen($room)<2)
	{
		$message="Please Choose Room Name Between 2 to 20 Chracters";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/Joy-The-Chatting-Site";';
		echo '</script>';	
	}

	elseif (!ctype_alnum($room))
	{
		$message="Please Choose AlphaNumeric Room Name";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'	");';
		echo 'window.location="http://localhost/Joy-The-Chatting-Site";';
		echo '</script>';	
	}

	else
	{
		//For Connection With Database
		include 'db_connect.php';
	}
	echo "Lets Chat Now";

	// To Check if Room Already Exist

	$sql= "SELECT * FROM `rooms` WHERE roomname='$room';";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
			$message="Please Choose Different Room, This Room is Already Occupied";
			echo '<script language="javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="http://localhost/Joy-The-Chatting-Site";';
			echo '</script>';			
		}

		else
		{
			$sql="INSERT INTO `rooms` (`roomname`,`stime`) VALUES ('$room',CURRENT_TIMESTAMP);";
			
			if(mysqli_query($conn,$sql))
			{
				$message="Your Room Is Ready, You can Chat Now.";
				echo '<script language="javascript">';
				echo 'alert("'.$message.'");';
				echo 'window.location="http://localhost/Joy-The-Chatting-Site/rooms.php?roomname=' . $room.'";';
				echo '</script>';					
			}
		}
	}

	else
	{
		echo "Error: ". mysqli_error($conn);
	}
?>