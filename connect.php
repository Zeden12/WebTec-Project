<?php

  $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname ="Register";
	$id="";

	$conn = mysqli_connect($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
  ?>