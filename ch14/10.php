<?php

$date = DateTime::createFromFormat('m-d-Y', '8-21-2012');
echo $date->format('Y-m-d'); //output: 2012-08-21

$date2 = DateTime::createFromFormat('d-m-Y', '21-8-2012');
echo $date2->format('Y-m-d'); //output: 2012-08-21
echo "<br/>";

