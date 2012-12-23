<?php

$a = 'BDT532.2394'; 
$b = '532.2394BDT';

echo "$a becomes ". floatval($a)." when it is float. <br/>";
echo "$b becomes ". floatval($b)." when it is float. <br/>";
echo "$a becomes ". intval($a) . " when it is integer. <br/>";
echo "$b becomes ". intval($b) . " when it is integer. <br/>";
echo "$a becomes ". strval($a) . " when it is string. <br/>";
echo "$b becomes ". strval($b) . " when it is string. <br/>";

