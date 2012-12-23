<?php

$str = "this is my string";
echo "Original Type is:". gettype($str) ." and value is : ". $str ."<br/>";
//let us change it to array
settype($str, 'array');
echo "Now type is: ". gettype($str) ." and value is: ";

echo "<pre>";
print_r($str);
echo "</pre>";
