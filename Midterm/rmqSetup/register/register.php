<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_log("Hello, errors!");

echo "here";
//  include ("Register-functions.php");
  include ("functions.php");
  include ("accounts.php");
  include ("client.php");

echo "include statements";

($dbh = mysqli_connect ($hostname, $username, $password,$project)) or die ("Unable to connect to MySQL database");

  if (mysqli_connect_errno())
    {
  	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	  exit();
    }

  echo "here now";
  echo "Successfully connected to MySQL. <br><br>";

  //GETS INPUT
  $name = $_POST["name"];
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  $con  = $_POST["conPass"];
  $response = registration($name,$user,$pass,$con);
  if($response != true){
    redirect ("Username and password already exists, please use new credentials", "Midterm/register.html");
  }else{
    update($name,$user,$pass);
    redirect ("Successfully created accout, please login","Midterm/index.html")
  }

?>
