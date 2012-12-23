<?php
$n = 43951789;
$u = -43951789;
$c = 65; //ASCII equivalent of 'A' is 65

/* %% is used in the following expressions to show one % sign */
//shows as binary
printf("%%b = '%b' <br />", $n);
//prints as ASCII character 
printf("%%c = '%c' <br />", $c); 
//prints as integer
printf("%%d = '%d' <br />", $n); 
//prints as scientific value
printf("%%e = '%e' <br />", $n); 
//comverts positive integer to unsigned integer
printf("%%u = '%u' <br />", $n); 
//converts negative integer to unsigned integer
printf("%%u = '%u' <br />", $u);
//shows as floating point or floats
printf("%%f = '%f' <br />", $n); 
//shows as octal
printf("%%o = '%o' <br />", $n); 
//shows as string
printf("%%s = '%s' <br />", $n); 
//small letter hexadecimal
printf("%%x = '%x' <br />", $n); 
//capital letter hexadecimal
printf("%%X = '%X' <br />", $n); 

//positive integer sign
printf("%%+d = '%+d' <br />", $n); 
//negative integer sign
printf("%%+d = '%+d' <br />", $n); 
?>
