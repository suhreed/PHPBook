<?php
session_start();

if(isset($_SESSION)) {
	echo "Session started...";
} else {
	echo "Session not started...";
}
