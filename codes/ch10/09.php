<?php

$filename = 'mynewfile.txt';

if (is_executable($filename)) {
	echo "The file $filename is executable";
} else {
	echo "The file $filename is not executable";
}
?>
