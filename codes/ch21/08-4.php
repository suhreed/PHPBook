<?php
$array["one"]=array();
$array["two"]=array();
$array["three"]=array();

$array["one"][0]=1;
$array["one"][1]=1.5;
$array["two"][0]=2;
$array["two"][1]=2.5;
$array["three"][0]=3;
$array["three"][1]=3.5;

if (((10>=9) && (1<4)) || !(5>10)) {
	 foreach ($array as $inner_array) {
	 				 for($i = 0; $i < count($inner_array); $i++) {
					 print($inner_array[$i]."<br>");
					}
	 }
}

?>