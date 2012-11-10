<?php

$mytext = "abbaxabbaxbbx";

echo ereg("([ab]+x){2}", $mytext, $arr); 

echo "<pre>";
print_r($arr);
echo "</pre>";


