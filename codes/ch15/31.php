<?php

function cmp($a, $b) {
	if ($a == $b) {
		return 0;
	}
	return ($a > $b) ? -1 : 1;
}

//array with key
$books = [1 =>"Expert Networking",
		  3 =>"Linux Networking",
		  25 =>"Windows Networking",
		  8 =>"Cisco Networking",
		  15 =>"Social Networking"];

uksort($books, 'cmp');

foreach ($books as $key=>$value) {
	echo "$key: $value <br />";
}

?>