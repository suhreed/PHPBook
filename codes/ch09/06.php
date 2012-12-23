<html>
   <head>
      <title>Example Form - Multiple Select</title>
    </head>
   <body>
        
   <h2>Example Form - Multiple Select</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        User Name: <br />
        <input type="text" size="20" name="user" /> <br />
        Books in collection: <br />
        <select size="5" name="books[]" multiple>
        <option>Web Publishing
        <option>Expert Networking
        <option>Windows 2000 Professional
        <option>XML
        <option>Red Hat/Fedora Linux
        <option>Linux Networking
        </select> <br />
        Comment: <br />
        <textarea cols="50" rows="2" wrap="virtual" name="comment"></textarea> <br />
        <input type="hidden" name="token" value="mytok" />
        <input type="submit" value="Send" />
    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<h2>Welcome, $_POST[user]</h2>";
        echo "<p>Here is your comment:<br> $_POST[comment]</p>";
        echo "<p>Here are the books in your collection:</p>";
        echo "<ol>";
        foreach ($_POST[books] as $book) {
            echo "<li> $book </li>";
        }
        echo "</ol>";

    }
?>
</body>
</html>