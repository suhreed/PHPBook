<?php

//shows x number of latest posts
function getLatestPosts($num=5) {

	$mysqli = new mysqli('localhost', 'root', '', 'myblog');

	$sql = "SELECT * FROM posts ORDER BY created LIMIT ?";

	$stmt = $mysqli->prepare($sql);

	$stmt->bind_param('i', $num);

	$stmt->execute();

	$stmt->bind_result($id, $title, $text, $author, $created, $modified);

	$posts = '';

	while($stmt->fetch()) {
		//$post_list = '<ul class="nav">';
	    $posts .= '<li><a href="post.php?id='.$id.'">'.$title .'</a></li>';
	    //$post_list .= '</ul>' 
	}

	$stmt->close();
	$mysqli->close();

	echo "<h4>$num Latest Posts</h4>";
	echo '<ul class="nav">';
	echo $posts;
	echo '</ul>';
}

//show login form
include_once('login.php');

function getAuthorsList($num=10) {
	$mysqli = new mysqli('localhost', 'root', '', 'myblog');

	$sql = "SELECT id, fname, lname FROM authors ORDER BY id DESC LIMIT ?";

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $num);
	$stmt->execute();
	$stmt->bind_result($aid, $fastname, $lastname);

	$author ='';

	while ($stmt->fetch()) {
		$author .='<li><a href="author.php?aid='. $aid .'">'. $fastname .' '. $lastname .'</a></li>';		
	}

	echo "<h4>Authors</h4>";
	echo '<ul class="nav">';
	echo $author;
	echo '</ul>';
}	

getAuthorsList(5);
