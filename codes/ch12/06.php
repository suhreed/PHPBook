<?php

if($_REQUEST) {
	
	foreach ($_REQUEST as $key => $value) {
		echo "$key : $value <br />";
	}
}