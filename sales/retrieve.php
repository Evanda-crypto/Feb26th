<?php

// Get the user id
$bname = $_REQUEST['bname'];

// Database connection
include("../db/db.php");

if ($bname !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($connection, "SELECT Region,
	BuildingCode FROM building WHERE BuildingName='$bname'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$Bcode = $row["BuildingCode"];

	// Get the first name
	$Reg = $row["Region"];
}

// Store it in a array
$result = array("$Bcode", "$Reg");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
