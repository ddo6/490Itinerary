<?php

  include ("Register-functions.php");
  include ("account.php");
  
  ($dbh = mysql_connect ($hostname, $username, $password)) or die ("Unable to connect to MySQL database");
  		
  mysql_selectdb($project);

  print "Successfully connected to MySQL. <br><br>";
  
  //GETS INPUT
  $name = $_GET["name"];
  $user = $_GET["user"];
  $pass = $_GET["pass"];
  $con  = $_GET["conPass"];
  
  print "name '$name' user '$user' pass '$pass' <br><br>"; 

  user($user);  
  
  update($name, $user, $pass);
  
  print "<br><br>This interaction is completed";
  
  header("refresh: 2; url=https://web.njit.edu/~jet33/simple/SimpleLogin.html");
?>
