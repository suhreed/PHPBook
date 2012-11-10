<?php

$mysqli = new mysqli('localhost', 'root', '', 'blog');

$sql = "SELECT id, first_name, last_name, user_email FROM authors";

if($stmt = $mysqli->prepare($sql)) {
	$stmt->execute();

	$stmt->bind_result($id, $fname, $lname, $email);

	while ($stmt->fetch()) {
		echo "$fname $lname $email ";
		echo  '<a href="edit_author.php?id='.$id.'" > edit </a> <br />';
	}

	$stmt->close();

} else {
	echo "Statement error: ". $mysqli->error;
}

$mysqli->close();
