<?php

ini_set('error_reporting', none);

$name1 = "Mahfuz";
$name2 = "Rafiq";
$name3 = "Stephen";
$name4 = "Sabina";

foreach ($GLOBALS as $key=>$value) {
	print "\$GLOBALS[\"$key\"] == $value <br />";
}

?>