<?php

$text = "    I am some text to be operated        ";
$lt = ltrim($text);			
$rt = rtrim($text);	
$bt = trim($text);

echo "<pre>";
var_dump($text, $lt, $rt, $bt);
echo "</pre>";