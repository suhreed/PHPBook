<?php
session_start();

//set session variables
$_SESSION['name'] = $_REQUEST['name'];
$_SESSION['age'] = $_REQUEST['age'];

//show the session variables
echo "your name: ".$_SESSION['name'] ."<br/>";
echo "your age: ". $_SESSION['age'] ."<br/>";

//see whole session array
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";