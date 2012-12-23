<?php

$text = "\t\tThese are a few words :) ...    ";

$q = trim($text);	//strip left and right whitespace		
$r = trim($text, " \t."); //strip ... 

echo "<pre>";
var_dump($text, $q, $r);
echo "</pre>";

