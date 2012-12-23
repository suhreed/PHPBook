<?php
$filename = 'mynewfile.txt';
if (is_readable($filename)) {
	echo "The file $filename is readable";
} else {
	echo "The file $filename is not readable";
}
?>
