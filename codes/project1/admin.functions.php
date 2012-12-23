<?php

/* Show list of all posts */
function listPosts() {
	require_once 'admin.db.php';
	echo "<h3>Posts List</h3>";

	$sql = "SELECT id, title, text, created, modified 
			FROM posts
			ORDER BY modified DESC 
			LIMIT 0,30";
	$result = $mysqli->query($sql);
	echo "<table class='table'>";
	echo "<th>Title</th>";
	echo "<th>Created On</th>";
	echo "<th>Modified On</th>";
	echo "<th>Actions</th>";

	while ( $post = $result->fetch_object() ) {
		echo "<tr>";
		echo "<td> $post->title </td>";
		echo "<td> $post->created </td>";
		echo "<td> $post->modified </td>";
		echo "<td> ";
		echo "<a href=admin.php?op=edit&pid=$post->id ><i class=icon-edit></i></a> &nbsp;";
		echo "<a href=admin.php?op=delete&pid=$post->id ><i class=icon-remove></i></a>&nbsp;";
		echo "<a href=admin.php?op=publish&pid=$post->id><i class=icon-arrow-up></i></a>&nbsp;";
		echo "<a href=admin.php?op=unpublish&pid=$post->id><i class=icon-arrow-down></i></a>";

		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

	$result->free_result();
	$mysqli->close();
}

/*Show Add Post Form */
function addPostForm() {
	echo "<h3>Add Post</h3>";
	echo "<form action='admin.php?op=save' method='post'>";
	echo "<label for='title'>Title</label>";
	echo "<input class='input-large' type='text' name='title' required=required value='' placeholder='type your post title...'/>";
	
	echo "<p>Post content <textarea class='input-block-level' name='text' rows='3' ></textarea>";
	echo "<input class='btn btn-primary' type='submit' value='Add Post' />";
	echo "<input class='btn' type='reset' value='Cancel' />";
	echo "</form>";
}

/* Save post submitted by add form */
function addPost() {
	require_once 'admin.db.php';
	$title = trim($_POST['title']);
	$content = trim($_POST['text']);
	$author = '1';

	$sql = "INSERT INTO posts (title, text, author_id, created, modified) VALUES (?, ?, ?, NOW(), NOW())";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('ssi', $title, $content, $author);
	if($stmt->execute()) {
	  echo "Post <b> $title </b> added Successfuly!";
	}
	$stmt->close();
	$mysqli->close();
}

/* Delete a post */
function deletePost($id) {
	require_once 'admin.db.php';
    $id = (int) trim($id);

	$sql = "DELETE FROM posts WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();

	echo "Post # $id deleted.";
}

/* edit post form */
function editForm($id) {
	require_once 'admin.db.php';

	$sql = "SELECT id, title, text, created, modified 
			FROM posts
			WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($id, $title, $text, $created, $modified);
	while($stmt->fetch()){
		echo "<h3>Edit Post</h3>";
		echo "<form action='admin.php?op=update' method='post'>";
		echo "<label for='title'>Title ";
		echo "<input class='input-large' type='text' name='title' value='".$title."' /></label>";
		echo "<label for='text'>Post content <textarea class='input-block-level' name='text' rows='3' >";
		echo $text;
		echo "</textarea></label>";
		echo "<label for='created'>Created <input type='text' name='created' value='".$created."' /></label>";
		echo "<label for='modified'>Modified <input type='text' name='modified' value='".$modified."' /></label>";
		echo "<input type='hidden' name='pid' value=$id />";
		echo "<input class='btn btn-primary' type='submit' value='Update Post' /> &nbsp;";
		echo "<input class='btn btn-secondary' type='reset' value='Cancel' />";
		echo "</form>";
   }
   $stmt->close();
   $mysqli->close();
}

/* edit a post */
function editPost($id) {
	require_once 'admin.db.php';
	$title = trim($_POST['title']);
	$content = trim($_POST['text']);
	$created = trim($_POST['created']);
	$modified = trim($_POST['modified']);

	$sql = "UPDATE posts SET title = ?, text = ?, created = ?, modified = NOW()
			WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('sssi', $title, $content, $created, $id);
	if($stmt->execute()) {
	  echo "Post <b> $title </b> updated Successfuly!";
	}
	$stmt->close();
	$mysqli->close();
}

/* publish a post */
function publishPost($id) {
	require_once 'admin.db.php';
	$id = trim($id);
	
	$sql = "UPDATE posts SET status = 1	WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	if($stmt->execute()) {
	  echo "Post <b>published</b> Successfuly! <a href=admin.php?op=unpublish >Unpublish now</a>.";
	}
	$stmt->close();
	$mysqli->close();
}

/* unpublish a post */
function unpublishPost($id) {
	require_once 'admin.db.php';
	$id = trim($id);
	
	$sql = "UPDATE posts SET status = 0	WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	if($stmt->execute()) {
	  echo "Post <b> unpublished </b> successfuly! <a href=admin.php?op=publish >Publish now</a>.";
	}
	$stmt->close();
	$mysqli->close();
	
}



