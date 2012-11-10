<?php

$text = "A paragraph could contain a series of brief examples or a single long illustration of a general point";

$words = explode(" ", $text);

shuffle($words);

echo "<pre>";
print_r($words);
echo "</pre>";