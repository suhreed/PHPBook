<?php

$str = "Bangladeshi PHP developers are very active";
$vowels = array('a', 'e', 'i', 'o', 'u');

$onlyConsonants = str_replace($vowels, '_', $str);

echo "Before: ".$str . "<br/>";
echo "After : ".$onlyConsonants;
