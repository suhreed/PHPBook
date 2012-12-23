<?php

$dom = new DomDocument();
$dom->load("articles.xml");

//output the XML
echo $dom->saveXML();

//save as file
echo $dom->save('arts.xml');



