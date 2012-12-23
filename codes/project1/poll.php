<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'myblog';


function getPoll() {
    
    global $host, $user, $pass, $db;

    $mysqli = new mysqli($host, $user, $pass, $db);

    //select question
    $sql = "SELECT id, title FROM questions WHERE active = 1 ORDER BY created DESC LIMIT 1";
    
    //prepare statement
    $stmt = $mysqli->prepare($sql);
    
    $stmt->execute();

    $stmt->bind_result($qid, $title);
        
    while($stmt->fetch()) {
        $html = '<h2>'. $title .'</h2>';
    } 

    $sql2 = "SELECT id, answer, anscount FROM answers WHERE qid = ?";
  //prepare statement
   $stmt = $mysqli->prepare($sql2);

   $stmt->bind_param('i', $qid);
   $stmt->execute();

   $stmt->bind_result($aid, $answer, $anscount);

   while($stmt->fetch()) {
        $html2 .= "<input type='radio' name='aid' value=$aid>". $answer .'<br />';
    }

    echo '<form name="poll" action="'.$_SERVER['PHP_SELF'].'" method="post">'; 
    echo  $html;
    echo  $html2;
    echo  '<input type="hidden" name="qid" value="'.$qid.'" />';
    echo  '<input type="submit" name="vote" value="Vote" />';
    echo  "</form>";

    $stmt->close();
    $mysqli->close();

}

/** function for adding vote count **/
function addVote($aid, $qid) {

    global $host, $user, $pass, $db;
    
    $mysqli = new mysqli($host, $user, $pass, $db);

    $sql =  "UPDATE answers SET anscount = anscount + 1 WHERE id = ".$aid." AND qid = ".$qid;
    
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    echo "<strong>Your vote was successfully recorded.</strong>";
    showResult($qid);
    $stmt->close();
    $mysqli->close();
}

/********** show result ************/
function showResult($qid) {
  global $host, $user, $pass, $db;
    
  $mysqli = new mysqli($host, $user, $pass, $db);     
  $sql = "SELECT answer, anscount FROM answers WHERE qid = ? ORDER BY anscount DESC";
  $stmt->prepare($sql);
  $stmt->execute();

 echo "<ol>";
 while($stmt->fetch()) {
        echo "<li>". $answer .'</li>';
    }
 echo "</ol>";
}


if($_POST['vote']) {
$aid = $_POST['aid'];
$qid = $_POST['qid'];
//print_r($_POST);

addVote($aid, $qid);
//showResult($qid);

}


getPoll();

