<?php
require_once('calendar.class.php');

//create calendar from a specified date
$cal = new Calendar('2013-12-16');

//show calendar November 2013
echo $cal->output_calendar('2013', '11');
//show calendar December 2013
echo $cal->output_calendar('2013', '12');
