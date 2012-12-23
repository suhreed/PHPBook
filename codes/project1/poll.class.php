<?php

class Poll {

	var $show_vote_count;
	var $active_poll_id;
	var $active_poll_title;
	var $timestamp;
	var $timeout;
	var $ip;
	var $repeated_vote;
	var $results_page;
	var $old_polls;

	function __construct() {
		$this->show_vote_count = true; // display total votes? true/false
		$this->pollLayout();
		$this->getActivePoll();
		$this->timestamp = time();
		$this->timeout = $this->timestamp - 1800;
		$this->ip = $_SERVER['REMOTE_ADDR'];
		$this->repeated_vote = "You already voted today<br />";
		$this->results_page = "results.php"; // page where you display results
		$this->old_polls = true; // if true enables view of old polls. this only display old polls it doesn't allow users to vote. true/false
		
	}
	
	function pollLayout() {
		// it allows you to set visual settings using CSS definitions included in file where you're calling this class
		// replace these with your own CSS styles
		$this->form_table_width = "120px";
		$this->form_title = "menuhd";
		$this->form_table = "tabele";
		$this->form_table_cell = "poll";
		$this->form_button = "formlook";
		$this->poll_question = "fat"; // this is for <span> tag
		$this->results_title = "menuhd";
		$this->results_table = "";
		$this->results_poll_question = "fat";
		$this->result_table_width = "450px";
		$this->result_table_cell = "pollbg";
		$this->bar_image = "bar.gif"; // please select 1px width x 15px height image
	}
	
	function getActivePoll() {
		$sql = "SELECT id, title FROM questions WHERE active = 1";
		$result = $mysqli->query($sql);
		$row = $result->fetch_object();
		$this->active_poll_id = $row->id;
		$this->active_poll_title = $row->title;
		return;
	}
	
	function voteCount() {
		$sql = @mysql_query ("SELECT SUM(votecount) AS votecount FROM poll_data WHERE pollid = '$this->active_poll_id'");
		$row = @mysql_fetch_object($sql);
		$this->votecount = $row->votecount;
		return $this->votecount;
	}
	
	function pollForm() {
		$sql = @mysql_query ("SELECT polltext, voteid FROM poll_data WHERE pollid = '$this->active_poll_id' ORDER BY voteid");
		if (@mysql_num_rows($sql) > 0) {
			echo "<table width=\"$this->form_table_width\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" class=\"$this->form_table\">
			<tr><td class=\"$this->form_title\">Mini Poll</td></tr>
			<tr><td class=\"$this->form_table_cell\">\r\n";
			echo "<form action=\"$this->results_page\" name=\"pollf\" id=\"pollf\" method=\"get\">
			<span class=\"$this->poll_question\">" . $this->active_poll_title . "</span><br />\r\n";
			
			while ($row = @mysql_fetch_object($sql)) {
				if (!empty($row->polltext)) {
					echo "\t<input type=\"radio\" name=\"voteid\" value=\"$row->voteid\" /> $row->polltext <br />\r\n";
				}
			}
			
			echo "<input type=\"hidden\" name=\"pollid\" id=\"pollid\" value=\"$this->active_poll_id\" /><br />\r\n";
			echo "<input type=\"submit\" name=\"poll\" id=\"poll\" value=\"Vote\" class=\"$this->form_button\" />
			<hr size=\"1\" noshade=\"noshade\" />";
			if ($this->show_vote_count) {
				echo "Total votes: " . $this->voteCount() . "\r\n";
			}
			echo "<a href=\"$this->results_page?pollid=$this->active_poll_id\">View results</a>
			</form>\r\n</td></tr></table>\r\n";
		}
	}
	
	function deleteCheck() {
		$sql = @mysql_query ("DELETE FROM poll_check WHERE time < '$this->timeout'");
		return;
	}
	
	function insertCheck() {
		$sql = @mysql_query ("INSERT INTO poll_check (ip, time) VALUES ('$this->ip', '$this->timestamp')");
		return;
	}
	
	function voteCheck() {
		$this->deleteCheck();
		$sql = @mysql_query ("SELECT ip FROM poll_check WHERE ip = '$this->ip'");
		if (@mysql_num_rows($sql) == 0) {
			$this->insertCheck();
			return true;
		}
		else {
			return false;
		}
	}
	
	function processPoll($pollid, $voteid) {
		if ($this->voteCheck()) {
			$sql = @mysql_query ("UPDATE poll_data SET votecount = votecount + 1 WHERE voteid = '$voteid' AND pollid = '$pollid'");
		}
		else {
			echo $this->repeated_vote;
		}
	
	}
	
	function selectedPoll($pollid) {
		$sql = "SELECT polltitle FROM poll_desc WHERE pollid = '$pollid'";
		$query = $mysqli->query($sql);
		$row = $query->fetch_object();
		$this->polltitle = $row->polltitle;
		return $this->polltitle;
	}
	
	function selectedPollVotecount($pollid) {
		$sql = @mysql_query ("SELECT SUM(votecount) AS votecount FROM poll_data WHERE pollid = '$pollid'");
		$row = @mysql_fetch_object($sql);
		$this->votecount = $row->votecount;
		return $this->votecount;
	}
	
	function formatDate($val) {
		$arr = explode("-", $val);
		return date("d. F Y.", mktime (0,0,0, $arr[1], $arr[2], $arr[0]));
	}
	
	function oldPolls($pollid) {
		$sql = mysql_query ("SELECT pollid, polltitle, timestamp FROM poll_desc WHERE pollid <> '$pollid'");
		if (mysql_num_rows($sql) > 0) {
			echo "<tr><td class=\"$this->result_table_cell\" colspan=\"2\">\r\n";
			while ($row = mysql_fetch_object($sql)) {
				$datum = $this->formatDate($row->timestamp);
				echo "<a href=\"$this->results_page?pollid=$row->pollid\">$row->polltitle</a> $datum<br />\r\n";
			}
			echo "</td></tr>\r\n";
		}
	}
	
	function pollResults($pollid) {
		$this->selectedPoll($pollid);
		$this->selectedPollVotecount($pollid);
		$sql = @mysql_query ("SELECT polltext, votecount, voteid FROM poll_data WHERE pollid = '$pollid' AND polltext <> '' ORDER BY voteid");
		echo "<table border=\"0\" width=\"$this->result_table_width\" class=\"$this->results_table\">
		<tr><td class=\"$this->results_title\" colspan=\"2\">Mini Poll Results</td></tr>";
		if (@mysql_num_rows($sql) > 0) {
			echo "<tr><td class=\"$this->results_poll_question\" colspan=\"2\">$this->polltitle</td></tr>\r\n";
			while ($row = mysql_fetch_object($sql)) {
				if ($this->votecount == 0) {
					$tmp_votecount = 1;
				}
				else {
					$tmp_votecount = $this->votecount;
				}
				$vote_percents = number_format(($row->votecount / $tmp_votecount * 100), 2);
				$image_width = intval($vote_percents * 3);
				echo "<tr><td class=\"$this->result_table_cell\">$row->polltext $row->votecount votes. ($vote_percents %)</td><td class=\"$this->result_table_cell\"> <img src=\"$this->bar_image\" width=\"$image_width\" alt=\"$vote_percents %\" height=\"15\" /> </td></tr>\r\n";
			}
			echo "<tr><td class=\"$this->result_table_cell\" colspan=\"2\">Total votes: $this->votecount</td></tr>\r\n";
		}
		if ($this->old_polls) {
			$this->oldPolls($pollid);
		}
		echo "</table>\r\n";
		
	
	}

}
?>