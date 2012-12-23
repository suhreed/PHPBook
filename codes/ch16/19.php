<?php

$str = "ABCDEFGHIJKL";

$rep = "xyz";

echo substr_replace($str, $rep, '0') ."<br />"; //xyz
echo substr_replace($str, $rep, '5') ."<br />";   //ABCDExyz
echo substr_replace($str, $rep, 5, 3) ."<br />";   //ABCDExyzIJKL
echo substr_replace($str, $rep, -1, 3) ."<br />";   //ABCDEFGHIJKxyz
echo substr_replace($str, $rep, -4, 3) ."<br />";   //ABCDEFGHxyzL
