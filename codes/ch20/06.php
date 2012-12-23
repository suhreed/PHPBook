<?php

$dom = new DomDocument(); 
$dom->loadHTMLFile("http://www.w3.org/"); 

$titles = $dom->getElementsByTagName("h3"); 

foreach ($titles as $title) {
	echo $title->textContent."<br/>";
}

echo $dom->saveHTML();

$dom->saveHTMLFile('w3c.html');

?>