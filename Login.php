<?php

// The username is the user's email address
$username = $_POST['username'];

// Create connection
$con=mysqli_connect("localhost", "root",NULL,"rebel-scrum");

// Check the connection
if (mysqli_connect_errno())
{
	echo "Failed too connect to server: " . mysqli_connect_error();
}

// This SQL statement gets the password for the given username
if ($username != '')
{
	$sql = "SELECT password FROM person where emailAddress='$username'";
}

// Check if there are results
if ($result = mysqli_query($con, $sql))
{
	// If so, create a results array and a temporary
	// array to hold the data

	$resultArray = array();
	$tempArray = array();

	$row = $result->fetch_object();
	echo json_encode($row);
}
else
{
	$arr = array('failure' => 0);
	echo json_encode($row);
}

// Close the connections
mysqli_close($con);

?>