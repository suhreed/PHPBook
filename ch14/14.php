<?php

$date = new DateTime('now');
echo "Now : ". $date->format('Y-m-d H:i:s') . "<br />";

$date->sub(new DateInterval('P2Y3M4DT5H6M7S'));
echo "2 years 3 months 4 days 5 hours 6 minutes 7 seconds ago : ". $date->format('Y-m-d H:i:s') . "\n";
