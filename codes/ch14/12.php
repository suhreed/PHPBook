<?php

$birthday = new DateTime('2001-12-10 19:20:07');
$now = new DateTime('now');

$interval = $birthday->diff($now);

echo "Your age in days: ". $interval->format('%r%a days');
echo "<br />";

echo "Your age in years: ". $interval->format('%y years');
echo "<br />";

echo "Your age : ". $interval->format('%y years %m months %d days %h hours %i minutes %s seconds');
