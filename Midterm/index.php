<?php

session_start();
echo session_id();
echo "um what";

if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
}


//Error Reporting
include ("error_log.php");
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
  redirect("Successfully logged in","home.html");
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
