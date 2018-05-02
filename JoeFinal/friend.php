<?php
  session_start();

  if (mysqli_connect_errno())
  {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
  }


  include ( "accounts.php" ) ;
  include ( "functions.php" ) ;

  //Connect to DB
  ($dbh = mysqli_connect ($hostname, $username, $password,$project)) or die ("Unable to connect to MySQL database");

  //Error Reporting
  include ("error_log.php");

  //Gets Form Database
  $friend = $_GET["friend"];
  $user = $_SESSION["sessUser"];

  echo "User: $user <br>";
  echo "Friend: $friend <br><br>";

  //Check if user with username entered exists
  $sql = "select * from 490accounts where UserName = '$friend'";
  ($t = mysqli_query($dbh,$sql)) or die (mysqli_error($dbh));

  $num = mysqli_num_rows($t);

  if($num == 1)
  {
      //Add to friend table if they do
      $sql = "insert into friend (Username, Friendname) values ('$user', '$friend')";
      mysqli_query($dbh, $sql);

      redirect("Friend successfully added. Redirecting back to previous page","friend.html");
  }
  else
  {
    redirect("No user with name entered. Redirecting back to previous page","friend.html");
  }


?>
