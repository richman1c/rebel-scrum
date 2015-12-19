<?php
session_start();
//include("includes/dbconnect.php");

$u_firstName = $_POST['u_fname'];
$u_lastName = $_POST['u_lname'];

$u_phone_1 = $_POST['u_phone_1'];
$u_phone_2 = $_POST['u_phone_2'];
$u_phone_3 = $_POST['u_phone_3'];

$u_month = $_POST['u_month'];
$u_day = $_POST['u_day'];
$u_year = $_POST['u_year'];

$u_email = $_POST['u_email'];
$u_confirmemail = $_POST['u_confirmemail'];

$u_pass = $_POST['u_pass'];
$u_confirmpass = $_POST['u_confirmpass'];



$u_firstName = $_POST['e1_fname'];
$u_lastName = $_POST['e1_lname'];

$u_phone_1 = $_POST['e1_phone_1'];
$u_phone_2 = $_POST['e1_phone_2'];
$u_phone_3 = $_POST['e1_phone_3'];

$u_month = $_POST['e1_month'];
$u_day = $_POST['e1_day'];
$u_year = $_POST['e1_year'];

$u_email = $_POST['e1_email'];
$u_confirmemail = $_POST['e1_confirmemail'];



$u_firstName = $_POST['e2_fname'];
$u_lastName = $_POST['e2_lname'];

$u_phone_1 = $_POST['e2_phone_1'];
$u_phone_2 = $_POST['e2_phone_2'];
$u_phone_3 = $_POST['e2_phone_3'];

$u_month = $_POST['e2_month'];
$u_day = $_POST['e2_day'];
$u_year = $_POST['e2_year'];

$u_email = $_POST['e2_email'];
$u_confirmemail = $_POST['e2_confirmemail'];

$message = "";
$returnValue = FALSE;

//USER VALIDATION
// Verifies there is a valid email address in the 'Email' textbox
if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/", $u_email)) {
    $message .= "User's Email Address format is incorrect.";
    $returnValue = TRUE;
}
//Verifies the user wrote the correct email address.
if(strcmp($u_email, $u_confirmemail) != 0){
    $message .= "\nUser's Email and confirm email do not match.";
    $returnValue = TRUE;
}
//Verifies the user wrote the correct password.
if(strcmp($u_pass, $u_confirmpass) != 0){
    $message .= "\nUser's Password and confirm password do not match.";
    $returnValue = TRUE;
}

//EMERGENCY CONTACT 1 VALIDATION
// Verifies there is a valid email address in the 'Email' textbox
if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/", $e1_email)) {
    $message .= "\nPrimary emergency contact Email Address format is incorrect.";
    $returnValue = TRUE;
}
//Verifies the user wrote the correct email address.
if(strcmp($e1_email, $e1_confirmemail) != 0){
    $message .= "\nPrimary emergency contact Email and confirm email do not match.";
    $returnValue = TRUE;
}

//EMERGENCY CONTACT 2 VALIDATION
// Verifies there is a valid email address in the 'Email' textbox
if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/", $e2_email)) {
    $message .= "\nSecondary emergency contact Email Address format is incorrect.";
    $returnValue = TRUE;
}
//Verifies the user wrote the correct email address.
if(strcmp($e2_email, $e2_confirmemail) != 0){
    $message .= "\nSecondary emergency contact Email and confirm email do not match.";
    $returnValue = TRUE;
}


if($returnValue) {
	$_SESSION['validation_errs'] = $message;
	header("Location: ../web/register.php");
}

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
