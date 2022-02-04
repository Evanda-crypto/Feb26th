<?php

// Get the user id
$techie1 = $_REQUEST['techie1'];

// Database connection
include("../../db/db.php");

if ($techie1 !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT * FROM employees WHERE FIRST_NAME='$techie1'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$email = $row["EMAIL"];
}

// Store it in a array
$result = array("$email");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
