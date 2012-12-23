<?php
error_reporting(0);

$fruits = array('Mango', 'Apple', 'Lichi', 'Pineapple', 'Strawberry');

echo "Before unset:";
echo "<pre>";
var_dump($fruits);
echo "</pre>";

echo "After Unset:";
echo "<pre>";
unset($fruits);
var_dump($fruits);
echo "</pre>";
