<?php

$birthday = new DateTime('2001-12-10');
$today = new DateTime('today');

$interval = $birthday->diff($today);

echo "Your age in days: ". $interval->format('%r%a days');
echo "<br />";

echo "Your age in years: ". $interval->format('%y years');
echo "<br />";

echo "Your age : ". $interval->format('%y years %m months %d days');
