<html>
   <head>
      <title>Example Form</title>
    </head>
   <body>
   <h1>Example Form</h1>
   <p> Please submit your name and comment. </p>
    <form action="process.php" method="POST">
        User Name: <input type="text" size="20" name="user" /> <br />
        Comment: <br /><textarea cols="50" rows="8" wrap="VIRTUAL" name="comment"></textarea> <br />
        <input type="submit" value="Send" />
    </form>
   </body>
</html>
