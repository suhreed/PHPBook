<?php
$sxe = simplexml_load_file("articles.xml"); 
foreach($sxe->xpath('/articles/item/title') as $item) { 
    echo $item . "<br />"; 
} 

?>
