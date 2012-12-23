<?php

echo "<h2>Output of system() function)</h2>";
echo "<p>The same thing will be shown if you type 'help' in the cmd shell of Windows</p>";

echo "<pre>";
system("help", $ret_var);
echo "</pre>";
