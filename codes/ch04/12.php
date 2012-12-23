<?php

$a = 55;

$b =& $a*2; //$b should be 110


print $b; //prints  110

$a = 65; // $a = 65 now

echo "<br/>";
print $b; //prints 110
