<?php
$dom = new DOMDocument();
$dom->load("articles.xml");

$item = $dom->createElement("item"); 
$title = $dom->createElement("title"); 
$titletext = $dom->createTextNode("XML in PHP5"); 

$title->appendChild($titletext); 

$item->appendChild($title); 

$dom->documentElement->appendChild($item); 

if($dom->save('artx.xml')) {
	echo "Saved successfully";
}

?>