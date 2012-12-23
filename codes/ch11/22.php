<?php

$mysqli = new mysqli('localhost', 'root', '', 'blog');

//$sql = "DELETE FROM authors WHERE first_name = 'Suhreed'";
$sql = "UPDATE authors SET country = 'USA' WHERE id > 2";

if($stmt = $mysqli->prepare($sql)) {
	$stmt->execute();

	echo "Affected rows: ". $stmt->affected_rows;

	$stmt->close();


} else {
	echo "Statement error: ". $mysqli->error;
}

$mysqli->close();
