<?php

$dom = new DomDocument();
$dom->load("articles.xml");

//get titles from the XML
$titles = $dom->getElementsByTagname("title");
foreach($titles as $title) {
	echo $title->textContent ."<br/>";
}


