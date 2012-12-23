<?php
session_start();

//set session variables
$_SESSION['name'] = "Borhan Uddin";
$_SESSION['age'] = "40";

//show the session variables
echo "your name: ".$_SESSION['name'] ."<br/>";
echo "your age: ". $_SESSION['age'] ."<br/>";

//let us unset session
session_unset();

//see whole session array
echo "After unset...";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";