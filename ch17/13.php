<?php

$t= "25/12/2012, 14/5/2015";

$tx = preg_replace("|\b(\d+)/(\d+)/(\d+)\b|", "\\2/\\1/\\3", $t);

echo "Now $t becomes $tx <br/>";
