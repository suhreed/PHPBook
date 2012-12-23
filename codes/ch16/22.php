<?php

$s = "ll"; //to search
$r = "**";   //to be replaced with
$sub = "good golly miss molly!"; //subject

//let's do the operation
$str = str_replace($s, $r, $sub, $count);

//see result
echo "We found $s in $sub $count times and replaced with $r. Now the string is : $str.";
