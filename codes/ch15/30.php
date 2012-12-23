<?php

$books = array (
		"Expert Networking"=> array('pages'=>460, 'price'=>280.00),
		"Web Publishing"=> array('pages'=>720, 'price'=>450.00),
		"Linux Networking"=> array('pages'=>530, 'price'=>300.00),
		"Windows 2000 Server"=> array('pages'=>820, 'price'=>450.00),
		"Redhat/Fedora Linux" => array('pages'=>820, 'price'=>450.00),
		"Joomla! E-commerce with VirtueMart" => array('pages'=>440, 'price'=>3850.00)
	);

//function for comparing
function priceCmp ($a, $b) {
	if ($a['price']== $b['price'] )
		return 0;
	if ($a['price'] < $b['price'] )
		return 1;
	}

uasort ($books, 'priceCmp');

foreach ($books as $key=>$val) {
	echo "$key (pages $val[pages], price BDT $val[price] )<br />";
}
