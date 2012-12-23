<?php


//lists all available polls
function listPolls() {

    require_once 'db.php';

	$sql = "SELECT qid, qtitle FROM questions ORDER BY qdate DESC";
	$result = $mysqli->query($sql);
    
    echo "<ul>";
	while ($poll = $result->fetch_object()) {
		echo  "<li> <a href=index.php?op=show&qid=$poll->qid >$poll->qtitle <i class='icon-list'></i></a>";
		echo  "<a href=index.php?op=edit&qid=$poll->qid ><i class=icon-edit></i></a>";
		echo "<a href=index.php?op=delete&qid=$poll->qid ><i class=icon-remove></i></a>";
		echo "</li>";
	}
	echo "</ul>";

	$result->free();
	$mysqli->close();

}

//shows a particular poll
function showPoll($qid) {
	require_once 'db.php';

	if(!empty($qid) && is_numeric($qid)) {
		$sql ="SELECT qid, qtitle FROM questions WHERE qid = ?";
	} else {
		$sql ="SELECT qid, qtitle FROM questions WHERE ORDER BY qdate LIMIT 0,1";
	}

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $qid);
	$stmt->execute();
	$stmt->bind_result($id, $title);

	while($stmt->fetch()) {
		echo "<h3>$title</h3>";
	}
	$stmt->close();

	//get the answers for this poll
	$sql2 = "SELECT aid, atitle, qid FROM answers WHERE qid = $qid";
	$result = $mysqli->query($sql2);

	echo "<form action='index.php' method='get'>";
	while($ans = $result->fetch_object()) {
		echo "<input type='radio' name='aid' value=$ans->aid> $ans->atitle <br />";
	}
    echo "<input type='hidden' name='qid' value=$qid /> <br />";
	echo "<input type='hidden' name='op' value='vote' />";
	echo "<input type='submit' value='Vote' class='btn btn-primary' />";
	echo "&nbsp;";
	echo "<a class='btn' href='index.php?op=result&qid=".$qid."'>Show Result</a>";

	echo "</form>";
	$result->free_result();
	$mysqli->close();

}

//shows a form for adding a poll
function addPollForm() {
	echo "<h3>Add Poll Form</h3>";
	echo "<form action='index.php?op=save' method='post'>";
	echo "<label for='qtitle'>Question</label>";
	echo "<input class='input-large' type='text' name='qtitle' value='' placeholder='type your poll question here...'/>";
	echo "<label for='option1'>Option 1</label>";
	echo "<input type='text' name='options[]' value='' id='option1' placeholder='... add option 1 ...' />";
	echo "<label for='option2'>Option 2</label>";
	echo "<input type='text' name='options[]' value='' id='option2' placeholder='... add option 2 ...' />";
	echo "<label for='option3'>Option 3</label>";
	echo "<input type='text' name='options[]' value='' id='option3' placeholder='... add option 3 ...' />";
	echo "<label for='option4'>Option 4</label>";
	echo "<input type='text' name='options[]' value='' id='option4' placeholder='... add option 4 ...' />";
	
	echo "<input class='btn btn-primary input-block-level' type='submit' value='Add' />";
	echo "</form>";
}

//add poll info submitted by form
function addPoll() {
	require_once 'db.php';

	//echo "Poll data added";
	$qtitle = trim($_POST['qtitle']);
	if ($qtitle == '') {
		die("Error: Please enter a question.");
	}

	foreach ($_POST['options'] as $ops) {
		if (trim($ops) != '') {
			$atitles[] = $ops;
		}
	}

	//lets check whetehr at least 2 options given
	if (sizeof($atitles) < 2) {
		die("Error: Please enter at least two answer choices.");
	}

	$sql = "INSERT INTO questions (qtitle, qdate) VALUES (?, NOW())";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('s', $qtitle);
	$stmt->execute();
	$qid = $mysqli->insert_id;
	//$result->free_result();

	//lets insert options
	foreach ($atitles as $atitle) {
		$sql = "INSERT INTO answers (qid, atitle, acount) VALUES (?, ?, '0')";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param('ss', $qid, $atitle);
		$stmt->execute();
		$stmt->close();
	}

	$mysqli->close();
	echo "Poll <b> $qtitle </b> successfully added.";
}

//shows poll edit Form
function editForm($qid) {
	include_once 'db.php';
	$sql = "SELECT qid, qtitle, qdate FROM questions WHERE qid = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $qid);
	$stmt->execute();
	$stmt->bind_result($qid, $qtitle, $qdate);
	while($stmt->fetch()){
		$html  = "<form action='index.php?op=save' method='post'>";
		$html .= "Tite: <input name='qtitle' type='text' value='".$qtitle."' /><br />";
		$html .= "URL: <input name='url' type='text' value='".$qdate."' /><br />";
		//$html .= "Active?: <input type='radio' name='status' value='1'> Yes";
		//$html .= "<input type='radio' name='status' value='0'> No";
		$html .= "<input type='hidden' name='qid' value=$qid /> <br />";
		$html .= "<input type='submit' value='Submit' />";
		$html .= "<input type='reset' value='Cancel' />";

		$html .= "</form>";
	}
	echo $html;

	$stmt->close();
	$mysqli->close();

}

//update edited info
function editPoll($qid) {
	echo "poll data updated for Poll # $qid";
}

//deletes a poll 
function deletePoll($qid){
	require_once 'db.php';

	//first delete the options
	$sql = "DELETE FROM answers WHERE qid = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $qid);
	$stmt->execute();
	$stmt->close();

	//now delete question
	$sql = "DELETE FROM questions WHERE qid = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $qid);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();

	echo "Poll # $qid deleted successfully.";
}


//add vote
function addVote($aid, $qid) {
	require_once 'db.php';
	
	//check for cookie if has voted already
	if (isset($_COOKIE) && !empty($_COOKIE)) {
		if ($_COOKIE['lastpoll'] && $_COOKIE['lastpoll'] == $_REQUEST['qid']) {
			die("Error: You have already voted in this poll");
		}
	}
	//set cookie
	setcookie('lastpoll', $_REQUEST['qid'], time() + 2000);

	if(!isset($_REQUEST['aid'])) {
		die("Error: Please select one of the available choices.");
	}

	$sql = "UPDATE answers 
			SET acount = acount + 1 
			WHERE aid = $aid AND qid = $qid";
	
		$mysqli->query($sql);
		echo "Your vote was successfully registered! You can see the <a class='btn btn-info' href=index.php?op=result&qid=$qid> result here </a>.";

}

//shows result
function showResult($qid) {
	require_once 'db.php';

	$sql = "SELECT qtitle FROM questions WHERE qid = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $qid);
	$stmt->execute();
	$stmt->bind_result($qtitle);
	while($stmt->fetch()) {
		echo "<h3>Results: $qtitle </h3>";
	}
	$stmt->close();

	//get number of total votes
	$sql = "SELECT qid, atitle, SUM(acount) AS total 
			FROM answers 
			GROUP BY qid
			HAVING qid = $qid";

	$result = $mysqli->query($sql);
	$row = $result->fetch_object();
	$total = $row->total;
	if ($total > 0) {
		$sql = "SELECT atitle, acount FROM answers WHERE qid = $qid ORDER BY acount DESC";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_object()) {
				$percent = (int) ($row->acount*100 / $total);
				echo $row->atitle." (".$row->acount.", $percent %)";
				echo "<div class='progress'>";
				echo "<div class='bar' style='width:".$percent."%'>";
				echo "</div></div>";
			} 
				
		} else {
			echo "Not vote casted yet.";
		}

		} 
}

