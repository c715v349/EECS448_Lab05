<?php
	
	$mysqli = new mysqli("mysql.eecs.ku.edu", "cvo", "cvo", "cvo");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$user = $_POST["user"];
	$query = "INSERT INTO Users (user_id) VALUES ('$user')";
	
	if ($user != "")
	{
		if ($result = $mysqli->query($query)) {
			echo ("User was successfully set into database");
		}
		else
		{
			echo ("User could not be set");
		}
	}
	else
	{
		echo ("User could not be set");
	}

	/* close connection */
	$mysqli->close();
?>
