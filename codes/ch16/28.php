<?php

$str = "Apple|Orange|Pineapple|Mango|Lichi";
$fruits = explode('|', $str, -3);

echo "<pre>";
print_r($fruits);
echo "</pre>";