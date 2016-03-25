<?php 
	echo '<style>
	table, tr, td
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
	
	$user = $_POST["user"];
	$query = "SELECT post_id,content FROM Posts WHERE author_id = '$user'";
	echo "<h3>List of posts by $user</h3>";
	
	if ($result = $mysqli->query($query)) {
		
		/* fetch associative array */
		echo "<table>";
		while ($row = $result->fetch_assoc()) { 
			printf ("<tr><td>Post id: %s</td><td>%s</td></tr>\n", $row["post_id"], $row["content"]);
		}
		echo "</table>";
		
	    /* free result set */
	    $result->free();
	}

	/* close connection */
	$mysqli->close();
?>