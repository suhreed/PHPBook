<?php

$text = "parul prefers perfect pepper pot";

if (preg_match("/p.?t/", $text, $arr)) { 
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}