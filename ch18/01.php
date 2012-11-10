<?php

//starting session
session_start();

$sid = session_id();

if (isset($_SESSION['counter'])) {
  $cnt = $_SESSION['counter'];
}

//increment session counter
 $_SESSION['counter']++;

//prints counter value
if (isset($cnt)) {
	echo "You have visited this page $cnt times with session id $sid. ";
} else {
	echo "Session counter not set yet.";
}
