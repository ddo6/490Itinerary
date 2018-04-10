<?php
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_log("Hello, errors!");


require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

  include ( "accounts.php" ) ;

  //Connect to db

  //user function makes sure there is a user in the database with the name and password entered
  function auth ($user, $pass)
  {

  	//check credentials and fetchs current balance if credentials are valid
    global $dbh;

    $s = "select * from 490accounts where UserName = '$user' and Password = '$pass'";
    echo "<br>$s<br>";
    ($t = mysqli_query($dbh,$s)) or die (mysqli_error($dbh));
    $num = mysqli_num_rows($t);

    if($num>0){
      return true;
    }
    else {
      return false;
    }
  }

  //update function will insert user into table
  function update ($name, $user, $password)
  {
    //insert into accounts
    $s = "insert into 490accounts values ('$name',  '$user', '$password')";

    ($t = mysqli_query($s)) or die ( mysqli_error());

    return;
  }

    //redirect function to redirect user to corrrect pages
  function redirect($message,$url){
    $delay=4;
    echo "$message";
    header("refresh:$delay; url=$url");
    exit();
  }

  function requestProcessor($request)
  {
      echo "received request".PHP_EOL;
      var_dump($request);
      if(!isset($request['type']))
      {
        return "ERROR: unsupported message type";
      }
      switch ($request['type'])
      {
        case "login":
          return auth($request['user'],$request['pass']);
        case "validate_session":
          return doValidate($request['sessionId']);
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }
    $server = new rabbitMQServer("testRabbitMQ.ini","testServer");
    $server->process_requests('requestProcessor');
    exit();

?>
