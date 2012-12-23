<html>
   <head>
      <title>Example Form - Checkboxes</title>
    </head>
   <body>
    <form action="get_or_post.php" method="POST">
        User Name: <br />
        <input type="text" size="20" name="user" /> <br />
        Books in collection: <br />
        <input type="checkbox" value="Web Publishing" name="books[]"/> Web Publishing <br />
        <input type="checkbox" value="Expert Networking" name="books[]"/> Expert Networking <br />
        <input type="checkbox" value="Windows 2000 Professional" name="books[]"/> Windows 2000 Professional <br />
        <input type="checkbox" value="XML" name="books[]"/> XML <br />
        <input type="checkbox" value="Red Hat/Fedora Linux" name="books[]"/> Red Hat/Fedora Linux <br />
        <input type="checkbox" value="Linux Networking" name="books[]"/> Linux Networking<br />
        Comment: <br />
        <textarea cols="50" rows="4" wrap="VIRTUAL" name="comment"></textarea> <br />
        <input type="submit" value="Send" />
    </form>
   </body>
</html>
