<?php
  
  //user function makes sure there is a user in the database with the name and password entered
  function user ($type, $name, $pass, $amount)
  {
  	//check credentials and fetchs current balance if credentials are valid
    $s = "select * from accounts where user = '$name' and pass = '$pass'";
     
    if(mysql_num_rows($t) == 0)
    {
      exit("Bad: Invalid Credentials");
    }
  }
  
  //get_A function will return information from the accounts table
  function get_A ($type, $s1) 
  {
    $out = "<br> \$s1 is: $s1 <br>"; 
    ($t = mysql_query($s1)) or die (mysql_error());
  
    while ( $r = mysql_fetch_array ($t) ) 
    {
  	  $user = $r["user"];
  	  $mail = $r["email"];
      $balance = $r["current_balance"];
      
  	  $out .= "<br>User is  $user";
  	  $out .= "<br>Mail is $mail";
      $out .= "<br>Current balance is $balance<br>";
    }
       
   	return $out;
  }
?>
