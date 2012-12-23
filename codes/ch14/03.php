<?php

$today = getdate();

echo "Today is ".$today['weekday']. " and it is ".$today['yday']." day of year ". $today['year'].". Timestamp is: ".$today[0];
