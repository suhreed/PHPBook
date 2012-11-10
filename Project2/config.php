<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "mypoll";


function getQuestion($id) {
	$mysqli = new mysqli($host, $user, $pass, $db);
	$sql = "SELECT qid, qtitle, FROM questions WHERE qid = ?";
	
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($id, $title);

	while($stmt->fetch()) {
		$html = "<h3> $title </h3>";
		$html .= ""
	}


}