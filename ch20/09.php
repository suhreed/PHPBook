<?php

$sxe = simplexml_load_file("articles.xml"); 

$sxe->item->title = "XML in PHP 5.4";  //new text content for the title element 
$sxe->item->title['id'] = 34; // new attribute for the title element 
$xmlString = $sxe->asXML(); // returns the SimpleXML object as a serialized XML string

file_put_contents("articles2.xml", $xmlString); 

print $xmlString; 

?>
