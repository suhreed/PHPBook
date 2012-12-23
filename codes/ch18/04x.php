<?php
session_start();

$_SESSION['name'] ="Borhan Uddin";
$_SESSION['var2'] ="another variable";

echo "Just after setting session:";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

echo session_status();


//session_unset();

echo "After unsetting session";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

//echo session_status();

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

//session_destroy();

echo "After destroying session:";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

echo session_status();


?>
