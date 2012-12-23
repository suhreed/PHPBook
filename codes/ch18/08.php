<?php

if (!isset($_COOKIE['visited'])) {
   
    setcookie("visited", "1", mktime()+86400, "/") or die("Could not set cookie");
    echo "This is your first visit here today.";
} else {
    echo "Nice to see you again, old friend!";
}

echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
