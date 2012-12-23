<?php

//function for adding tax
function add_tax (&$val, $key, $tax_pc) {
	$val += ($tax_pc/100)*$val;
}

$prices = [10, 12, 34, 23, 97];

array_walk($prices, 'add_tax', 10);

//let us see the prices now
echo "<pre>";
print_r($prices);
echo "</pre>";

