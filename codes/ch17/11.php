<?php

$text = "parul prefers perfect pepper pot";

ereg("p[a-zA-Z0-9_]+t", $text, $arr);
preg_match("/p\w+t/", $text, $arr2); 

echo "Result of ereg(): ".$arr[0] ."<br/>";
echo "Result of preg_match(): ".$arr2[0] ."<br/>";
