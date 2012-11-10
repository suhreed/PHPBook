<?php

$dom = new DOMDocument();
$dom->load("articles.xml");

$xp = new domxpath($dom); 

//get title by query
$titles = $xp->query("/articles/item/title"); 

//loop and show titles
foreach ($titles as $node) { 
    echo $node->textContent . "<br/>"; 
} 
