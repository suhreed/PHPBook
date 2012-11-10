<?php

 $a = 'myVariable';
 $$a = 'This is my Variable';

echo $a .'<br />'; //prints 'myVariable'

echo $$a.'<br />'; //prints 'This is my Variable'

echo $myVariable . '<br />'; //prints 'This is my Variable'

echo '$$a'; //prints $$a

echo "$$a"; //prints $myVariable

?>
