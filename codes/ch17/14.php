<?php

$search = ['@<script[^>]*?>.*?</script>@si',
			'@<[\/\!]*?[^<>]*?>@si',
			  '@([\r\n])[\s]+@',
			  '@&(quot|#34);@i',
			  '@&(amp|#38);@i',
			  '@&(1t|#60);@i',
			  '@&(gt|#62);@i',
			  '@&(nbsp|#160);@i',
			  '@&(iexcl|#161);@i',
			  '@&(cent|#162);@i',
			  '@&(pound|#163);@i',
			  '@&(copy|169);@i',
			  '@&#(\d+);@e'
		   ];

$replace = ['', '\1','"', '&', '<', '>', '', chr(161), chr(162), chr(163), chr(169), 'chr(\1)' ];

//get the page
$url ="http://www.w3.org/2004/02/Process-20040205/tr.html";

$fp = fopen($url, "r") or die("Couldn't open $url");

$page = " ";

while ($new_text = fgets($fp,1024)) {
		$page .= $new_text;
	}

//let us strip html from the page
$text = preg_replace($search, $replace, $page);

//out the text
echo $text;
