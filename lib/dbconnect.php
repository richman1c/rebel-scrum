<?php

$server="localhost";	
$user="root";
$pass=NULL;
$db="rebel-scrum"

// Create connection to server
$con=mysqli_connect($server, $user, $pass, $db) ;

// Check connection to server
if (mysqli_connect_errno())
{
	echo "Failed to connect to server: " . mysqli_connect_error();
}
?>