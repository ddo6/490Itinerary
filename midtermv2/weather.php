<?php

    $zipcode = $_GET['zipcode'];

    $request = 'http://api.openweathermap.org/data/2.5/weather?zip='.$zipcode.'&APPID=7ad09bc2d76e391ade92d0ec5ae571ea';

    $fp = fopen($request, "r");
    $contents = "";

    while($more = fread($fp, 1000)){
      $contents .= $more;
    }

    sleep(2.5);

    echo $contents;
?>
