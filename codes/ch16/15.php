<?php

$email = 'suhreedsarkar@gmail.com';
//$email = 'suhreedsarkar@live.com';

if ( substr($email,-9) == 'gmail.com' ) {
	echo "Welcome! We have special offer for Gmail users!";
} else {
	echo "Welcome to our Forum!";
}
