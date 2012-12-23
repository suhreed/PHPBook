<?php
//নিচেরটি কাজ করবে না, কারণ এর আর্গুমেন্ট ব্রাকেটের ভেতরে রাখা হয়েছে 
if (include('vars.php') == 'ok') {
	echo 'ok 1';
}

//এটি কাজ করবে
if ( include 'vars.php' == 'ok') {
	echo 'ok 2';
}
?>
