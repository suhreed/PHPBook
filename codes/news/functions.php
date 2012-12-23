<?php


function listFeeds() {
	include_once 'db.php';
	$sql = "SELECT id, title, url FROM feeds WHERE status = 1 ORDER BY title ASC";
	$result = $mysqli->query($sql);
	$num_results = $result->num_rows;

	$html = "<ul>";
	while ($feed = $result->fetch_object()) {
		$html .=  "<li><a href='index.php?op=show&url=".$feed->url."'>$feed->title <i class='icon-list'></i></a>";
		$html .=  "<a href=index.php?op=edit&id=$feed->id /><i class=icon-edit></i></a>";
		$html .=  "<a href=index.php?op=delete&id=$feed->id /><i class=icon-remove></i></a>";
		$html .= "</li>";
	}
	$html .= "</ul>";

	echo $html;

	$result->free();
	$mysqli->close();

}

/* adds a new feed */
function addFeed() {
	include_once 'db.php';
	$title = $_POST['title'];
	$url = $_POST['url'];
	$status = $_POST['status'];

	$sql = "INSERT INTO feeds (title, url, status) VALUES (?, ?, ?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('ssi', $title, $url, $status);
	$stmt->execute();
	echo "$title $url added successfully.";
	$stmt->close();
	$mysqli->close();
}

/* shows a feed add form */
function addForm() {
	$html  = "<form action='index.php?op=addfeed' method='post'>";
	$html .= "Tite: <input name='title' type='text' value='' /><br />";
	$html .= "URL: <input name='url' type='text' value='' /><br />";
	$html .= "Active?: <input type='radio' name='status' value='1'> Yes";
	$html .= "<input type='radio' name='status' value='0'> No";
	$html .= "<input type='submit' value='Add' />";
	$html .= "</form>";
	echo $html;
}

function showNews($url) {
   if(!isset($url)) {
   		$url = $_REQUEST['url'];
   }
   require_once 'simplepie.php';

   $feed = new SimplePie();
   $feed->set_feed_url($url);
   $feed->init();

}

/* shows the news of a feed */
function showFeed($id) {
	$url = $_REQUEST['url'];

	require_once('rssagent.class.php');
	$RSS = new RssAgent($url);

	for( $i = 0; $i < sizeof($RSS->title); $i++ ) {
			echo '<h3><a class="_link" href="' . $RSS->link[$i] . '" target="_blank">' . $RSS->title[$i] . '</a></h3>'; 
			echo '<span class="pDate">' . $RSS->pubDate[$i] . '</span> ';
			echo '<p>'. $RSS->description[$i] . '</p>';
			echo '<address><i class=icon-share></i>'; 
			echo '<a class="giud_link" href="' . $RSS->guid[$i] . '" target="_blank"> Read more... </a></address> ';
			echo "<p>";
		}
}

/* saves an edited feed */
function saveFeed($id) {
	include_once 'db.php';
	$title = $_POST['title'];
	$url = $_POST['url'];
	$status = $_POST['status'];

	$sql = "UPDATE feeds SET title=?, url=?, status=? WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('ssii', $title, $url, $status, $id);
	$stmt->execute();
	echo "$title $url updated successfully.";
	$stmt->close();
	$mysqli->close();

}

/* shows an edit form for feed */
function editForm($id) {
	include_once 'db.php';
	$sql = "SELECT id, title, url, status FROM feeds WHERE id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($id, $title, $url, $status);
	while($stmt->fetch()){
		$html  = "<form action='index.php?op=save' method='post'>";
		$html .= "Tite: <input name='title' type='text' value='".$title."' /><br />";
		$html .= "URL: <input name='url' type='text' value='".$url."' /><br />";
		$html .= "Active?: <input type='radio' name='status' value='1'> Yes";
		$html .= "<input type='radio' name='status' value='0'> No";
		$html .= "<input type='hidden' name='id' value=$id /> <br />";
		$html .= "<input type='submit' value='Add' />";
		$html .= "<input type='reset' value='Cancel' />";

		$html .= "</form>";
	}
	echo $html;	
}

/* deletes a particular feed */
function deleteFeed($id) {
	include_once 'db.php';
	$sql = "DELETE FROM feeds WHERE id = $id";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	echo "Feed # $id deleted successfully";
	$stmt->close();
	$mysqli->close();
}
