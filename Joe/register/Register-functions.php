<?php

  //user function makes sure there is not a user in the database with the same username
  function user ($user)
  {
  	//check credentials and fetchs current balance if credentials are valid
    $s = "select * from accounts where user = '$user'";
    
  	($t = mysql_query($s)) or die ( mysql_error());
     
    if(mysql_num_rows($t) > 0)
    {
      exit("Bad: Username taken");
    }
   
  	return;
  }

?>
