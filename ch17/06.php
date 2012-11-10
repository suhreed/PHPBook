<?php

$text = "Expert Networking, Linux Networking, Windows Server 2008 Administration and Joomla with Flash";

$books = split(', | and ', $text);

echo "Here are the books: <br/>";
foreach ($books as $book) {
	echo "$book <br/>";
}

