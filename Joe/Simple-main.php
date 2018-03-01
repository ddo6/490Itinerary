<?php

  include ("SL-functions.php");
  include("account.php");
  
  ($dbh = mysql_connect ($hostname, $username, $password)) or die ("Unable to connect to MySQL database");
  		
  mysql_selectdb($project);
  
  print "Results from A1.php with data from A1.html <br>";
  print "Successfully connected to MySQL. <br><br>";
  
  //GETS INPUT
  $name = $_GET["user"];
  $pass = $_GET["pass"];
  
  //Make sure user exists
  user($name, $pass);
  
  print "name '$name' pass '$pass' <br><br>"; 
  
  print "<br><br>This interaction is completed";
?>
