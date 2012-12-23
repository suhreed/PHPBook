<?php
error_reporting(0);

$a = "i am set";
$b;
$c = '';

function setOrNot($var) {
	error_reporting('NONE');

	if(isset($var)) {
		echo "Variable is set.";
	} else {
		echo "Variable is not set";
	}
}

//Let's test $a
echo "Test for \$a: ";
setOrNot($a);
echo "<br/>";
//let's test $b
echo "Test for \$b:";
setOrNot($b);
echo "<br/>";
//let's test for $c
echo "Test for \$c: ";
setOrNot($c);

