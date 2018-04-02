<?php

$zipcode = $_GET['zipcode'];
$keyword = "restaurant";
$radius = "400";

$request = 'http://api.openweathermap.org/data/2.5/weather?zip='.$zipcode.'&APPID=7ad09bc2d76e391ade92d0ec5ae571ea';
$georeq = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$zipcode.'&key=AIzaSyDfdBFT5iG_7TKg07U4VbOpi3uaQg7UfDM';

$r_json = file_get_contents($request);
$r_array = json_decode($r_json,true);
$g_json = file_get_contents($georeq);
$g_array = json_decode($g_json,true);

echo "$r_json<br><br>";

echo "$g_json<br><br>";

//echo "$f_json<br><br>";

echo "<br>$search";

$lat = $g_array['results'][0]['geometry']['location']['lat'];
$lng = $g_array['results'][0]['geometry']['location']['lng'];
$place = $g_array['results'][0]['address_components'][1]['long_name'];
$location = "$lat,$lng";
$phrase ="restaurants in $place";

$foodreq = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$location.'&radius=500&type=restaurant&keyword=restaurant&key=AIzaSyDfdBFT5iG_7TKg07U4VbOpi3uaQg7UfDM';

echo "<br>$phrase";

$f_json = file_get_contents($foodreq);
echo "<br>here<br><br>";
$f_array = json_decode($f_json,true);
echo "<br>$f_json<br><br>";

echo "<br>$location";
echo "<br>$place";
echo "<br>$phrase";
echo "<br>$request";
echo "<br>$georeq";
echo "<br>$query";
echo "<br>$foodreq";


/*$fp = fopen($request, "r");
$contents = "";

while($more = fread($fp, 1000)){
  $contents .= $more;
}

sleep(2.5);

echo $contents;
echo "<br><br>Hey<br><br>";

echo $contents[0]['coord'];*/

?>
