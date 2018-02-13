<?php
	function NewSQLConnection()
	{		
		$servername = "";
		$password = "";
		$username = "";
		$dbname = "";

		// $servername = "";
		// $password = "";
		// $username = "";
		// $dbname = "";
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