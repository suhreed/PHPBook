<?php
//	নিচের পদ্ধতি ভুল এবং এটি কাজ করবে না
if ($condition)
	include $file;
else 
	include $other;

//নিচের টি কাজ করবে
if ($condition) {
	include $file;
} else {
	include $other;
}
?>
