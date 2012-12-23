<?php
//error_reporting(0);

$fruits = array('Mango', 'Apple', 'Lichi', 'Pineapple', 'Strawberry');

//remove pineapple
unset($fruits[3]);

echo "After Removing pineapple:";
echo "<pre>";
print_r($fruits);
echo "</pre>";
