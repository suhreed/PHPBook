<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "mypoll";

$mysqli = new mysqli($host, $user, $pass, $db);

/* if database connection fails, show error message. */
if($mysqli->connect_errno) {
	echo "Connection Error: ". $mysqli->connect_error;
}
/*
$sql = "SELECT * FROM questions LIMIT 0 , 30";
	//$sql = "SELECT * FROM questions ORDER BY qdate DESC";
	$result = $mysqli->query($sql);
    
    echo "<ul>";
	while ($poll = $result->fetch_object()) {
		echo  "<li> <a href=index.php?op=show&qid=$poll->qid >$poll->qtitle <i class='icon-list'></i></a>";
		echo  "<a href=index.php?op=edit&qid=$poll->qid ><i class=icon-edit></i></a>";
		echo "<a href=index.php?op=delete&qid=$poll->qid ><i class=icon-remove></i></a>";
		echo "</li>";
	}
	echo "</ul>";
*/