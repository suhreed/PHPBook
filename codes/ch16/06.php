<?php

$books = array("Expert Networking" => "280.00", 
			    "Web Publishing" => "450.00",
		        "Linux Networking" => "300", 
		        "Windows 2000 Server" => "450.000",
		        "RedHat/Fedora Linux" => "450.00");

echo "<pre>";

printf("%-20s%20s\n", "Title", "Price");
printf("%'-40s\n", "");

foreach ($books as $key => $val) {
	printf("%-20s%20.2f\n", $key, $val);
}

echo "</pre>";

?>
