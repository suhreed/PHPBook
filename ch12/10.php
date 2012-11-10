<?php

$to			= 'someone@somesite.com';
$subject	= 'some subject of some importance';
$message	= 'something to say to someone on some day';
$headers	= 'From: webmaster@yoursite.com' . '\r\n' .
	'Reply-To: wemaster@yoursite.com' . '\r\n'.
	'X-Mailer: PHP/'. phpversion();

mail($to, $subject, $message, $headers);
