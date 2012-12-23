<?php

printf ("%04d",25); //prints 0025

echo "<br />";

//will show space as specifier
printf ("% 4d", 25);   //prints "  25"
echo "<br />";
echo "<br />";
/* some more examples */
printf ("%'x4d", 25);  //prints xx25
echo "<br />";
printf ("%'*4d", 25);   //prints **25
echo "<br />";
printf ("%'_4d", 25);  //prints __25
echo "<br />";
