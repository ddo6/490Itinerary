<?php

  include ("SL-functions.php");
  include("account.php");
  
  ($dbh = mysql_connect ($hostname, $username, $password)) or die ("Unable to connect to MySQL database");
  		
  mysql_selectdb($project);
  
  print "Successfully connected to MySQL. <br><br>";
  
  //GETS INPUT
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  
  //Make sure user exists
  user($user, $pass);
  
  print "name '$user' pass '$pass' <br><br>"; 
  
  print "<br><br>This interaction is completed";
?>
