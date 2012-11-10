<?php

$vowels = array("a", "e", "i", "o", "u");
$onlyconsonants = str_ireplace($vowels, "_", "This is Our Motherland And we love it");

echo $onlyconsonants; 
