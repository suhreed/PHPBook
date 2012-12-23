<?php

function foo() {
	global $color;

	include 'vars.php';

	echo "A $color $fruit";
}

foo();

echo "A $color $fruit";

?>