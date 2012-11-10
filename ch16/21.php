<?php

$food = "We eat beef, pork, mutton, chicken and fish everyday.";
$rich = array('beef', 'pork', 'mutton', 'chicken', 'fish');
$vegetarian = array('tomato', 'cauli flower', 'cabbage', 'beans', 'lettuce');

$healthyFood = str_replace($rich, $vegetarian, $food);

echo $healthyFood;  /* We eat tomato, cauli flower, cabbage, beans and lettuce everyday. */
