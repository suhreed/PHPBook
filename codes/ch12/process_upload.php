<?php
if($_FILES) {
	echo "Information about your uploaded file: <br />";
	foreach ($_FILES['myfile'] as $key => $value) {
		echo "$key : $value <br />";
	}
}
?>