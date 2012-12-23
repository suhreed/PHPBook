<?php

$data = 4.4563;

echo "\$data as original: ". gettype($data). "<br/>";
//now change type
settype($data, 'int');
//let see what happened
echo "\$data after conversion :". gettype($data) ."<br />";

echo "Value of \$data is: ". $data;

