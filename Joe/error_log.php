<?php
//  ini_set('display_errors', 1);
  ini_set('log_errors', 1);
  ini_set('error_log','/tmp/errorLog.txt');
//  error_reporting(E_ALL);

  set_error_handler('central_log', E_ALL);
  error_log("End of Error!\n");


?>
