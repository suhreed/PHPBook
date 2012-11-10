<?php

$memberno = $_GET['m'];

if ( strlen($memberno) >= 4) {
	echo "Thank you. Your membership number is $memberno .";
} else {
	echo "Sorry! Your membership number must have four digits.";
}