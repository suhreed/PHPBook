<?php

//format with '/'
$date = "04/30/2012";

list($month, $day, $year) = split('[/.-]', $date);
echo "$date is - Month: $month, Day: $day, Year: $year <br />";

// format with '.'
$date = "04.30.2012";

list($month, $day, $year) = split('[/.-]', $date);
echo "$date is - Month: $month, Day: $day, Year: $year <br />";

//format with '-'
$date = "04-30-2012";

list($month, $day, $year) = split('[/.-]', $date);
echo "$date is - Month: $month, Day: $day, Year: $year <br />";