<?php session_start(); ?>

<?php

  include ( "accounts.php" ) ;

  //Connect to db

  //user function makes sure there is a user in the database with the name and password entered
  function auth ($user, $pass)
  {

  	//check credentials and fetchs current balance if credentials are valid
    global $dbh;
    
    //Sanatizes inputs
    $username = mysql_real_escape_string($user);
    $password = mysql_real_escape_string($pass);

    $s = "select * from 490accounts where UserName = '$username' and Password = sha1('$password')";
    echo "<br>$s<br>";
    ($t = mysqli_query($dbh,$s)) or die (mysqli_error($dbh));
    $num = mysqli_num_rows($t);

    if($num>0)
	{
	  $_SESSION["logged"] = true;
      return true;
    }
    else 
	{
      return false;
    }
  }

  //update function will insert user into table
  function update ($name, $user, $pass)
  {
    //Sanatizes inputs
    $fullname = mysql_real_escape_string($name);
    $username = mysql_real_escape_string($user);
    $password = mysql_real_escape_string($pass);
  
    $pass = sha1($password);
  
    //insert into accounts
    $s = "insert into 490accounts values ('$name',  '$user', '$pass')";

    ($t = mysqli_query($s)) or die ( mysqli_error());

    return;
  }

    //redirect function to redirect user to corrrect pages
  function redirect($message,$url){
    $delay=4;
    echo "$message";
    header("refresh:$delay; url=$url");
    exit();
  }

  function gatekeeper()
  {
	if(!isset($_SESSION["logged"])  || !$_SESSION["logged"])
	{
		redirect ("Please login in correctly first.", "index.html");
		return; 
	}
  }
?>
