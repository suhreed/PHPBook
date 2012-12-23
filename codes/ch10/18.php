<html>
<head>
    <title>Opening and Reading data from file by fgetc()</title>
</head>
<body>
<h2>Opening and Reading data from file by fgetc()</h2>
<?php 
    $file_name = "myfile2.txt";
    $somecontent = "Add this  to the file. \n";
    if (is_writable($file_name)) {
       if (!$handle = fopen($file_name, 'a')) {
            echo "Cannot open file ($file_name)";
            exit;
       }
    
       if (fwrite($handle, $somecontent) === FALSE) {
           echo "Cannot write to file ($file_name)";
           exit;
       }
       
       echo "Success, wrote ($somecontent) to file ($file_name)";
       fclose($handle);
    } else {
    
    	echo "The file $file_name is not writable";
    }
?>
</body>
</html>
