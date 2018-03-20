<?php

  include ("SL-functions.php");
  include("account.php");
  
  ($dbh = mysql_connect ($hostname, $username, $password)) or die ("Unable to connect to MySQL database");
  		
  mysql_selectdb($project);
  
  print "Successfully connected to MySQL. <br><br>";
  
  //GETS INPUT
  $name = $_GET["user"];
  $pass = $_GET["pass"];
  
  user($name, $pass);
  
  print "name '$name' pass '$pass' <br><br>"; 
  
  print "<br><br>This interaction is completed";
  
  //Redirect 
  header("refresh: 2; url=https://web.njit.edu/~jet33/simple/home.html");
  
?>
