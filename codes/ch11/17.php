<?php

$mysqli = new mysqli('localhost', 'root', '', 'blog');

$sql = "SELECT * FROM authors";

if(!$result = $mysqli->query($sql)) {
	trigger_error($mysqli->error);
   } else {
	echo 'We have '. $result->num_rows.' rows in our table.';
	$result->close();
}

$mysqli->close();
