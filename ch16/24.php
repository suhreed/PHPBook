<?php

$str = "Mary Had  a Little lamb";
echo "Original: $str <br/>";

$str = strtoupper($str);
echo "strtoupper(): $str <br />"; 

$str = strtolower($str);
echo "strtolower(): $str <br/>"; 

$str = ucfirst($str);
echo "ucfirst(): $str <br/>";   

$str = ucwords($str);
echo "ucwords(): $str <br/>";    

