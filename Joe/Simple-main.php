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
  
  print "name '$name' pass '$pass' <br><br>"; 
  
  
  //SQL Statements
  $s1 = ""; //account table SQL
  
  sql ($type, $name, $s1);
  
  $result1 = get_A ($type, $s1); //account SQL statement result
  echo $result1;
  
  print "<br><br>This interaction is completed";
?>