<?php

  //user function makes sure there is not a user in the database with the same username
  function user ($user)
  {
  	//check credentials and fetchs current balance if credentials are valid
    $s = "select * from 490accounts where UserName = '$user'";
    
  	($t = mysql_query($s)) or die ( mysql_error());
     
    if(mysql_num_rows($t) > 0)
    {
      exit("Bad: Username taken");
    }
   
  	return;
  }
  
  //update function will insert user into table
  function update ($name, $user, $password)
  {
  	//insert into accounts
  	$s = "insert into 490accounts values ('$name',  '$user', '$password')";
  	
  	($t = mysql_query($s)) or die ( mysql_error());
  	
  	return;
  }

?>
