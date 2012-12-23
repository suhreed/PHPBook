<?php

function printArray ($var) {
	echo "Here are the elements of array:<br/>";
	foreach ($var as $key=> $val) {
		echo "$key: $val <br />";
	}
}

$a = ['mango', 'orange', 'jackfruit'];

printArray($a);

