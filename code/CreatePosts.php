<?php
	
	$mysqli = new mysqli("mysql.eecs.ku.edu", "cvo", "cvo", "cvo");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$user = $_POST["user"];
	$post = $_POST["userPost"];
	
	$query = "INSERT INTO Posts (author_id, content) VALUES ('$user', '$post')";
	
	if ($post == "")
	{
		echo ("Post was not saved.");
	}
	else
	{
		if ($result = $mysqli->query($query)) {
			echo ("Post was saved");
		}
		else
		{
			echo ("Post was not saved.");
		}
	}

	/* close connection */
	$mysqli->close();
?>
