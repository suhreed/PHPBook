<?php

$catalog = array(
        	'title'=> 'Web Publishing',
        	'author'=> 'Suhreed Sarkar',
        	'publisher' => 'Gyankosh Prokashani',
        	'price' => 'BDT 450'
			);

echo "Original Type is:". gettype($catalog) ." and value is : <br/>";
echo "<pre>";
print_r($catalog);
echo "</pre>";

//change it to object
settype($catalog, 'object');

//let us see the result
echo "<br/>";
echo "Now type is: ". gettype($catalog) ." and value is: ";

echo "<pre>";
print_r($catalog);
echo "</pre>";

//using array keys as object property
echo "Title: ". $catalog->title ."<br/>";
echo "Author: ". $catalog->author ."<br/>";
