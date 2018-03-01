<?php
  
  //user function makes sure there is a user in the database with the name and password entered
  function user ($name, $pass)
  {
  	//check credentials and fetchs current balance if credentials are valid
    $s = "select * from accounts where user = '$name' and pass = '$pass'";
    ($t = mysql_query($s)) or die ( mysql_error());
     
    if(mysql_num_rows($t) == 0)
    {
      exit("Bad: Invalid Credentials");
    }
  }
?>
