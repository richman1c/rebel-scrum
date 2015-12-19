<?php
    session_start();
// The username is the user's email address
$username = $_POST['username'];
$password = $_POST['password'];

// Create connection
include("lib/dbconnect.php");

// This SQL statement gets the password for the given username
if ($username != '')
{
	$sql = "SELECT COUNT(*) as isValid FROM auth where userID='$username' AND pass='$password'";
    $result = mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($result);
    $valid = $data['isValid'];
}

// Check if there are results

if ($valid)
{
	// If so, create a results array and a temporary
	// array to hold the data
    $_SESSION['userID'] = $username;
    header("Location: ../web/home.php");
}
else
{
    $_SESSION['loginerror'] = "Invalid username/password";
    header("Location: index.php");
}

// Close the connections
mysqli_close($con);

?>