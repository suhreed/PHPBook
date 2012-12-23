<?php

$var = "I love PHP";

//using gettype() function
echo "result using gettype() function :";
echo (gettype($var) == 'object')?"Is an Object":"Not an Object";

echo "<br/>";

//using is_object() function
echo "result using is_object() function : ";
echo is_object($var)?"Is an Object":"Not an Object";
