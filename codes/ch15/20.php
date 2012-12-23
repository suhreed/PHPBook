<?php

$a = "I am here";
$c = '';

function emptyOrNot($var) {
	if(empty($var)) {
		echo "Variable is empty.";
	} else {
		echo "Variable is not empty.";
	}
}

//Let's test $a
echo "Test for \$a: ";
emptyOrNot($a);
echo "<br/>";

//let's test for $c
echo "Test for \$c: ";
emptyOrNot($c);