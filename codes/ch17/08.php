<?php

$text = "pepper pot";
if (preg_match("/p.t/", $text, $arr)) {
 print_r($arr);
}
