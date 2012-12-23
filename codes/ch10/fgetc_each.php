<html>
    <head>
        <title>Opening and Reading data from file by fgetc()</title>
    </head>
    <body>
        <h2>Opening and Reading data from file by fgetc()</h2>
        <?php
        $file_name = "myfile2.txt";
        $fp = fopen($file_name, 'r') or die("Couldn�t open $file_name");
        while (!feof($fp)) {
            $char = fgetc($fp);
            print "$char <br />";
        }
        ?>
    </body>
</html>
