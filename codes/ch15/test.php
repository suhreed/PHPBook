<?php

$var1 = '20mb';
$var2 = "above 20mb";
$var3 = "1.3";


echo (5 * $var1);
echo "<br/>";
echo (5 * $var2);
echo "<br/>";
echo (5 * $var3);
echo "<br/>";

/* String increment changes last character */
$str = "hello";
$str++;
echo $str; //outputs: hellp
$str++;
echo $str; //outputs: hellq