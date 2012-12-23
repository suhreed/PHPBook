<html>
   <head>
      <title>Example Form Processor</title>
    </head>
   <body>
   <h1>Example Form Processor</h1>
    <?php
      echo "<p>Welcome <b> $_POST[user] </b></p>";
      echo "<p>Here is your comment: <i> $_POST[comment] </i>";
    ?>
   </body>
</html>
