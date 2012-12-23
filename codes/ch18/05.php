<?php
session_start();


$status = session_status();

if($status == PHP_SESSION_DISABLED) {
	echo "Session is disabled";
} 

if($status == PHP_SESSION_NONE) {
	echo "Session is active but no session variable set yet";
}

if($status == PHP_SESSION_ACTIVE) {
	echo "Session is active and session variables set";
}

