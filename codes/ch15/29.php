<?php

$books = array (
		 array ('title'=> "Expert Networking", 'price'=>280.00),
		 array ('title'=> "Web Publishing", 'price'=>450.00),
		 array ('title'=> "Linux Networking", 'price'=>300.00),
		 array ('title'=> "Windows 2000 Server", 'price'=>450.00),
		 array ('title'=> "Redhat/Fedora Linux", 'price'=>450.00),
		 array ('title'=> "Joomla! E-commerce with VirtueMart", 'price'=>3850.00)

	   );

function priceCmp ($a, $b) {
	if ($a['price']== $b['price'])
		return 0;
	if ($a['price'] < $b['price'])
		return 1;
	}

usort ($books, 'priceCmp');

foreach ($books as $val) {
	echo "$val[title]    (BDT $val[price] )<br />";
}
