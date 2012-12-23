<?php

$text = "A paragraph could contain a series of brief examples";

$words = explode(" ", $text);

shuffle($words);

echo "<pre>";
print_r($words);
echo "</pre>";