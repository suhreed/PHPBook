<?php

$m = "13";
$d = "23";
$y = "2012";


if (checkdate($m, $d, $y) == true) {
	//do something with correct date input
	echo "It IS a valid date.";
} else {
	//warn about invalid date
	echo "It IS NOT a valid date.";
}