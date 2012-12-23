<?php

$str = "this is my string";
echo "Original Type is:". gettype($str) ." and value is : ". $str ."<br/>";

//change it to object
settype($str, 'object');

//let us see the result
echo "Now type is: ". gettype($str) ." and value is: ";
echo "<pre>";
print_r($str);
echo "</pre>";

