<?php

$data = "foo:*:1023:1000::/home/foo:/bin/sh";
$user = explode(":", $data);

echo "<pre>";
print_r($user);
echo "</pre>";