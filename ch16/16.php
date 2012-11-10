<?php

$string = "This is a long sentence that we need to separate words";

$tok = strtok($string, " ");

while ($tok !== false) {
	$words[] = $tok;
	$tok = strtok(" ");
}

shuffle($words);

echo "<pre>";
print_r($words);
echo "</pre>";
