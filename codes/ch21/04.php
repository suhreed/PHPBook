<?php

//use error_log option in php.ini
fopen("./mytext", "a") or error_log(_FILE_." line "._LINE_." : Could not open mytxt.txt", 0);

//log in a file
fopen("./mytext", "a") or error_log(_FILE_." line "._LINE_." : Could not open mytxt.txt", 3, "errors.txt");

//send to email
fopen("./mytext", "a") or error_log(_FILE_." line "._LINE_." : Could not open mytxt.txt", 1, "admin@suhreed.org");

//send to SAPI error handler
fopen("./mytext", "a") or error_log(_FILE_." line "._LINE_." : Could not open mytxt.txt", 4);

//get full error message
fopen("./mytxt.txt", "a") or error_log(_FILE_." line "._LINE_." : $php_errormsg", 1, "admin@suhreed.org");

