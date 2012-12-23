<?php

$catalog = array('book'=>"Cisco Networking", 
                 'author'=>"Suhreed Sarkar");

$items = each($catalog);

echo $items[0];
echo "<br />";
echo $items[1];

echo "<hr />";

echo $items['key'];
echo "<br />";
echo $items['value'];
