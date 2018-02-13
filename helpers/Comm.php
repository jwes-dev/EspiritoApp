<?php
	function NewSQLConnection()
	{		
		$servername = "localhost";
		$password = "Daniel@1997";
		$username = "id3001818_admin";
		$dbname = "id3001818_espirito";

		// $servername = "localhost";
		// $password = "";
		// $username = "root";
		// $dbname = "espirito";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			return null;
		}
		else{
			return $conn;
		}
	}
?>