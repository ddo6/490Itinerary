<?php

  include ( "accounts.php" ) ;

  //Connect to db

  //user function makes sure there is a user in the database with the name and password entered
  function auth ($user, $pass)
  {

  	//check credentials and fetchs current balance if credentials are valid
    global $dbh;

    //Sanatizes inputs
    $username = mysqli_real_escape_string($dbh,$user);
    $password = mysqli_real_escape_string($dbh,$pass);

    $s = "select * from 490accounts where UserName = '$username' and Password = sha1('$password')";
    echo "<br>$s<br>";
    ($t = mysqli_query($dbh,$s)) or die (mysqli_error($dbh));
    $num = mysqli_num_rows($t);
    echo "<br>$num";

    if($num>0){
      return true;

    }
    else {
      return false;
    }
  }

  //update function will insert user into table
  function update ($name, $user, $password)
  {
    //Sanatizes inputs
    $fullname = mysqli_real_escape_string($dbh,$name);
    $username = mysqli_real_escape_string($dbh,$user);
    $password = mysqli_real_escape_string($dbh,$pass);

    $pass = sha1($password);

    //insert into accounts
    $s = "insert into 490accounts values ('$name',  '$user', '$pass')";
    echo "<br>$s";
    ($t = mysqli_query($dbh,$s)) or die ( mysqli_error($dbh));

    return;
  }

    //redirect function to redirect user to corrrect pages
  function redirect($message,$url){
    $delay=4;
    echo "$message";
    header("refresh:$delay; url=$url");
    exit();
  }

?>
