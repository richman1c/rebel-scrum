<?php

$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$dateOfBirth = $_POST['dateOfBirth'];

// Create connection to server
$con=mysqli_connect("localhost","root",NULL,"rebel-scrum");

// Check connection to server
if (mysqli_connect_errno())
{
	echo "Failed to connect to server: " . mysqli_connect_error();
}

// Retrieve the password for the given username
if ($username != '')
{
	$sql = "INSERT INTO person (lastName, firstName, phoneNumber, emailAddress, dateOfBirth) values ('$lastName', '$firstName', '$phoneNumber', '$userName', '$dateOfBirth')";
}

// Check to see if there are any results
if ($result = mysqli_query($con, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data

	$resultArray = array();
	$tempArray = array();

	$arr = array('success' => 1);
	echo json_encode($arr);
}
else
{
	$arr = array('failure' => 0);
	echo json_encode($arr);
}

// Close the connection to the server
mysqli_close($con);
?>
