<?php

$mysqli = new mysqli('localhost', 'root', '', 'blog');

$sql = "SELECT first_name, last_name, user_email FROM authors";

if($stmt = $mysqli->prepare($sql)) {
	$stmt->execute();

	$stmt->bind_result($fname, $lname, $email);

	while ($stmt->fetch()) {
		echo "$fname $lname $email <br />";
	}

	$stmt->close();

} else {
	echo "Statement error: ". $mysqli->error;
}

$mysqli->close();
