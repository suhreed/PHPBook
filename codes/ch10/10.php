<?php

$filename = '02.php';

if (is_file($filename)) {
	echo "Name: $filename <br/>";
	echo "Size: ". filesize($filename) ." bytes <br />";
	echo "Last accessed: ". date("d-m-y h:i:s", fileatime($filename)) ."<br />";
} else {
	echo "Sorry, $filename is not a file.";
} 

?>
