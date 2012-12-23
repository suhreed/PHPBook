<?php


$book = array('title'=>'Expert Networking', 'author'=>'Suhreed Sarkar');

reset($book);
while ( list($key, $value) = each($book) ) {
	echo "$key : $value <br />";
}

