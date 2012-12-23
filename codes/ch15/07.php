<?php

//a class for Book object
class Book {
	var $title;
	var $author;

	function Book($title, $author) {
		$this->title = $title;
		$this->author = $author;
	}

}

//let us create a book object
$book = new Book('Expert Networking', 'Suhreed Sarkar');

echo "<pre>";
print_r($book);
echo "</pre>";


//convert to array
settype($book, 'array');

//see output
echo "<pre>";
print_r($book);
echo "</pre>";