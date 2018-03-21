<?php
echo "here";
//  include ("Register-functions.php");
  include ("functions.php");
  include ("accounts.php");

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
  $name = $_GET["name"];
  $user = $_GET["user"];
  $pass = $_GET["pass"];
  $con  = $_GET["conPass"];

  if (!auth($user,$pass)){
    update($name,$user,$password);
    echo "<br>ranupdate statement";
    redirect("Successfully created account please login","midterm/490Itinerary/Midterm/index.html");
  }
  else{
    redirect("Username and password already exists please login or select new credentials","register.html");
  }

  print "name '$name' user '$user' pass '$pass' <br><br>";

  user($user);

  update($name, $user, $pass);

  print "<br><br>This interaction is completed";
?>
