<?php

$file = 'myfile.txt';
$newfile = 'myfolder/myfile.txt.bak';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
} else {
    echo "The $file is copied as $newfile";
}
?>