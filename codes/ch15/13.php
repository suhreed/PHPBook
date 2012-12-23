<?php

//define some variables
$a = "I am a string";
$b = true;
$c = ['orange', 'mango', 'jackfruit'];
$d = 5.49;
$e = new DateTime('now');

//test whether $a is string
if(is_string($a)) {
	echo "\$a [$a] is string <br/>";
}

//test whether $b is boolean
if(is_bool($b)) {
	echo "\$b [$b] is boolean. <br/>";
}

//test whether $c is array
if(is_array($c)) {
	echo "\$c is an array <br/>";
	echo "<pre>";
	print_r($c);
	echo "</pre>";
}

//test whether $d is double
if(is_double($d)) {
	echo "\$d [$d] is double!<br/>";
}

//test whether $e is object
if(is_object($e)) {
	echo "\$e is an object <br/>";
	echo "<pre>";
	print_r($e);
	echo "</pre>";
}