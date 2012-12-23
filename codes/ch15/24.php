<?php

$mysqli = new mysqli('localhost', 'root', '', 'blog');

$result = $mysqli->query("SELECT first_name, last_name, user_email, user_twitter, user_web FROM authors");

while( list($fname, $lname, $email, $twitter, $web) = $result->fetch_row() ) {
	echo "$fname $lname $email $twitter $web <br />";
	
}

$result->close();

$mysqli->close();
