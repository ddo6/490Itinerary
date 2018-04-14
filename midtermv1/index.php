<?php

session_start();

if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
}


include ( "accounts.php" ) ;
include ( "functions.php" ) ;

//Error Reporting
include ("error_log.php");

//Connect to DB

($dbh = mysqli_connect ($hostname, $username, $password,$project)) or die ("Unable to connect to MySQL database");

//Error Reporting
include ("error_log.php");

$user = $_GET["user"];
$pass = $_GET["pass"];

$_SESSION["sessUser"] = $user;

if (!auth($user,$pass))
{
  redirect("Incorrect Credentials entered, please try again or create an account","index.html");
}
else{
  redirect("Successfully logged in","homepage.html");
}

?>
