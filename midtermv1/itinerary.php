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

    //Retrieve text from html
    $name    = $_GET["name"];
    $address = $_GET['address'];

    //Check if fields are filled
    if($name == '' || $address == '')
    {
      redirect("Name or address is empty. Redirecting back to previous page","cuisine.html");
    }

    //Insert into database

    //Sanatizes inputs
    $name    = mysqli_real_escape_string($dbh, $name);
    $address = mysqli_real_escape_string($dbh, $address);

    $user = $_SESSION["sessUser"];

    $sql = "insert into itinerary (store_name, store_address, user_name) values ('$name', '$address', '$user')";
    mysqli_query($dbh, $sql);

    redirect("Store added to favorites. Redirecting back to previous page","cuisine.html");
 ?>
