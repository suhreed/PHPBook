<?php

$mystring = 'I like apple';
$findme = 'a';
$pos = strpos($mystring, $findme);


if ($pos === false) {
	echo "The string $findme was NOT found in the string $mystring. <br/>";
} else {
	echo "The string $findme was FOUND in the string $mystring ";
	echo "and exists at position $pos. <br />";
}

//new test with offset
$newstring = 'abcdef abcdef';
$pos = strpos($newstring, $findme, 1 ); //এখন $pos = 7, 0 নয়

echo "String $findme with offset 1 found in $newstring at position $pos.";
