<html>
    <head>
        <title>Creating Directory</title>
    </head>
    <body>
        <h2>Creating Directory</h2>
        <p>Please type a directory name, and click 'Create Directory' button to create the directory.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <label for="dirname">Directory Name</label>
            <input type="text" name="dirname" size="30">
            <input type="submit" value="Create Directory" />
        </form>
        <?php
        $dirname = $_GET[dirname];
        if (mkdir($dirname, 0777)==true) {
            echo "Successfully created <strong> $dirname </strong> directory.";
        } else {
            echo "Sorry, $dirname directory could not be created";
        }
        ?>
    </body>
</html>