<?php
 
//To set up and use the Vote Class
 
require_once('vote.class.php');
 
//Create a new instance and set a question
$vote = new Vote('What is your favorite scripting language?');
 
//Set the answers
$vote->setAnswers('PHP');
$vote->setAnswers('JAVA');
$vote->setAnswers('PERL');
$vote->setAnswers('HTML');
 
//If a user has voted
if(isset($_POST['vote']))
{
    $vote->insertVote($_POST['vote']);
    $vote->displayResults();
}

//If the user has clicked the Show Results button
else if(isset($_GET['results']))
{
    $vote->displayResults();
}
else
{
    $vote->displayVote();
}
 
?>