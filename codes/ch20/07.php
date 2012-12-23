<?php

$sxe = simplexml_load_file("articles.xml"); 

foreach($sxe->item as $item) { 
    echo $item->title ."<br />";
    echo $item->pubDate ."<br />"; 
    echo $item->description ."<p>"; 
}

?>
