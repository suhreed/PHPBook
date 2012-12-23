<?php


    addVote($_POST['qid']);

function getPoll() {
    
    $mysqli = new mysqli('localhost', 'root', '', 'myblog');

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

function addVote() {
    //add each vote and increment count

   //check whether voted earlier
    if ($_COOKIE['lastpoll'] && $_COOKIE['lastpoll'] == $_POST['qid']) {
        die('ERROR: You have already voted in this poll');
       }
   
   //check answer
   if (isset($_POST['submit'])) {

    if (!isset($_POST['aid'])) {
        die('ERROR: Please select one of the available choices');
    }

    $mysqli = new mysqli('localhost', 'root', '', 'myblog');
    $sql =  "UPDATE answers SET anscount = anscount + 1 WHERE id = ".$_POST['aid']." AND qid = ".$_POST['qid'];

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    echo "<strong>Your vote was successfully recorded.</strong>";
   }
}

/********** show result ************/
function showResult($pollid) {
      
}


     getPoll();
?>
