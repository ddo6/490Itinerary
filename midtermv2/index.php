<?php

session_start();
echo session_id();

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



//Connect to DB

($dbh = mysqli_connect ($hostname, $username, $password,$project)) or die ("Unable to connect to MySQL database");




$user = $_GET["user"];
$pass = $_GET["pass"];

if (!auth($user,$pass))
{
  redirect("Incorrect Credentials entered, please try again or create an account","index.html");
}
else{
  redirect("Successfully logged in","homepage.html");
}



echo "Username entered is $user<br>";
echo "Password is $pass<br>";

echo "<br>Checking User Credentials<br>";

/*if (! auth($user,$pass))
  {
    redirect ("Incorrect credentials entered, redirecting to login page.", "login.html", $delay);
  }
  else {

    global $db;
    $s = "select * from accounts where user = '$user' and pass = '$pass'";
    $t = mysqli_query($db,$s) or die(mysqli_error());
    $r = mysqli_fetch_array($t,MYSQLI_ASSOC);





    redirect ("Correct Credentials entered, redirecting to application.","formpage.php",$delay);
  }
 echo "<br>redirect function working";
*/


 ?>
