<?php

$filename = 'mynewfile.txt';

if (is_writable($filename)) {
	echo "The file $filename is writable";
} else {
	echo "The file $filename is not writable";
}
?>
