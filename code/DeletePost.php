 <?php
 	echo '
	<style>
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
	
	echo "<h3>Deleted Posts:</h3>";
	
	echo "<table>";
	if(isset($_POST["userPost"])){
		foreach($_POST["userPost"] as $checked){
			$query = "DELETE FROM Posts WHERE post_id = '$checked'";
			if ($result = $mysqli->query($query)) {
				printf ("<tr><td>Post id:</td><td>$checked</tr></td>");
			}
		}
	}
	echo "</table>";
	
	/* close connection */
	$mysqli->close();
?>
