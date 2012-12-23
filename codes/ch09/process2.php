<html>
   <head>
      <title>Example Form Processor</title>
    </head>
   <body>
   <h2> Example Form Processor: Multiple Select</h2>
    <?php
    echo "Welcome <b>$_POST[user]</b>";
    echo "<p>Here is your comment: <br /> <i> $_POST[comment]</i>";
    echo "<p><b>You have the following books in collection:</b>";
    echo "<ol>";
    foreach ($_POST['books'] as $book) {
      echo "<li> $book </li>";
    }
    echo "</ol>";
    ?>
   </body>
</html>