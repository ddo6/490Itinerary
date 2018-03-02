<?php

$name	= $_GET["user"];
$pass	= $_GET["pass"];

echo($name);
echo($pass);

function redirect ( $msg, $url )
{
echo "<br>$msg<br>";
header("refresh:2; url=$url");
exit();	
}

redirect("User successfully logged in", "490Itinerary/PROJECT/gatekeeper.html");
?>
