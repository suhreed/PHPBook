<?php

/* mktime() syntax:
   mktime($hour, $minute, $second, $month, $day, $year); 
   all arguments are optional
*/
//month 12, but day 32, so it is next year (2006)
echo date('M-d-y', mktime(0, 0, 0, 12, 32, 2005)).'<br>';
//month 13, day 1, so it is next year (2006)
echo date('M-d-y', mktime(0, 0, 0, 13, 1, 2005)).'<br>';
//month 1, day 1, so year remains same
echo date('M-d-y', mktime(0, 0, 0, 1, 1, 2006)).'<br>';

