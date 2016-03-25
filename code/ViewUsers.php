 <?php
 	echo '<style>
	table, td, tr
	{
		border: 1px solid #151B54;
	}	
	</style>';
	$mysqli = new mysqli("mysql.eecs.ku.edu", "cvo", "cvo", "cvo");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT user_id FROM Users";
	echo "<h1>List of Users:</h1>";
	
	if ($result = $mysqli->query($query)) {
		/* fetch associative array */
		echo "<table>";
		while ($row = $result->fetch_assoc()) { 
			printf ("<tr><td>%s</tr></td>", $row["user_id"]);
		}
		echo "</table>";
		
	    /* free result set */
	    $result->free();
	}

	/* close connection */
	$mysqli->close();
?>
