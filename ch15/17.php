<?php

function printArray ($var) {
	if(!is_array($var)) {
		echo "Sorry, variable passed is not an array. Please pass an array as argument.";
		//return false;
	} else {
    	echo "Here are the elements of array:<br/>";
		foreach ($var as $key=> $val) {
			echo "$key: $val <br />";
		}
	}
}

$a = 'I like mango,  orange and jackfruit';
$b = ['mango', 'orange', 'jackfruit'];

printArray($b);

