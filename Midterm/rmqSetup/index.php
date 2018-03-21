<?php

ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_log("Hello, errors!");

session_start();
echo session_id();
echo "um what";

if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
}


//Error Reporting
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

include ( "accounts.php" ) ;
include ( "functions.php" ) ;
include ( "client.php" );


//Connect to DB

($dbh = mysqli_connect ($hostname, $username, $password,$project)) or die ("Unable to connect to MySQL database");

$user = $_POST["user"];
$pass = $_POST["pass"];


$response = authentication($user,$pass);
if($response == false)
  {
    echo "Login Failed. Please enter correct credentials or register for an account";
  header( "Refresh:5; url=index.html", true, 303);
  }
  else
  {
  echo "Login Successful!";
  $_SESSION['user'] = $user;
  header( "Refresh:5; url=home.html", true, 303);
  }
?>
 ?>
