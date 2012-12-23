<?php

    if(isset($_SERVER['REMOTE_HOST'])) {
    	echo "Hello visitor at ". $_SERVER['REMOTE_HOST'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		echo "Hello visitor at ".$hostname;
	} else {
		echo "Hello you, wherever you are!";
	}
?>