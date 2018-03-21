<?php

  include ( "accounts.php" ) ;

  //Connect to db

  //user function makes sure there is a user in the database with the name and password entered
  function auth ($user, $pass)
  {

  	//check credentials and fetchs current balance if credentials are valid
    global $dbh;

    $s = "select * from 490accounts where UserName = '$user' and Password = '$pass'";
    echo "<br>$s<br>";
    ($t = mysqli_query($dbh,$s)) or die (mysqli_error($dbh));
    $num = mysqli_num_rows($t);
    echo "<br>Right after num rows";
    
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
    //insert into accounts
    $s = "insert into 490accounts values ('$name',  '$user', '$password')";

    ($t = mysqli_query($s)) or die ( mysqli_error());

    return;
  }

    //redirect function to redirect user to corrrect pages
  function redirect($message,$url){
    $delay=2;
    header("refresh:$delay; url=$url");
    exit();
  }

?>
