<?php
session_start();

include ( "account.php" ) ;
include ( "functions.php" ) ;

$name	= $_GET["user"];
$pass	= $_GET["pass"];

echo($name);
echo($pass);

?>
