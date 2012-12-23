<html>
    <head>
        <title>Removing Directory</title>
    </head>
    <body>
        <h2>Removing Directory</h2>
        <p>Please type a directory name, and click 'Remove Directory' button to delete the directory.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <label for="dirname">Directory Name</label>
            <input type="text" name="dirname" size="30">
            <input type="submit" value="Remove Directory" />
        </form>
        <?php
        $dirname = $_GET[dirname];
        if (rmdir($dirname)==true) {
            echo "Successfully deleted <strong> $dirname </strong> directory.";
        } else {
            echo "Sorry, $dirname directory could not be deleted";
        }
        ?>
    </body>
</html>