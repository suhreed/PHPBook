<?php

$sxe = simplexml_load_file("articles.xml"); 

foreach($sxe->item[0]->title->attributes() as $a => $b) { 
    print $a."=>".$b."<br />"; 
} 

?>
