<html>
   <head>
      <title>Example Form - Checkboxes</title>
    </head>
   <body>
   <h2>Example Form: Multiple Select</h2>
    <form action="process_all2.php" method="post">
        User Name: <br />
        <input type="text" size="20" name="user" /> <br />
        Books in collection: <br />
        <input type="checkbox" value="Web Publishing" name="books[]"/> Web Publishing <br />
        <input type="checkbox" value="Expert Networking" name="books[]"/> Expert Networking <br />
		    <input type="checkbox" value="Joomla! E-commerce with VirtueMart" name="books[]"/> Joomla! E-commerce with VirtueMart<br />
		    <input type="checkbox" value="Windows 2000 Professional" name="books[]"/> Windows 2000 Professional <br />
        <input type="checkbox" value="XML" name="books[]"/> XML <br />
		    <input type="checkbox" value="Joomla! with Flash" name="books[]"/> Joomla! with Flash <br />
		    <input type="checkbox" value="Red Hat/Fedora Linux" name="books[]"/> Red Hat/Fedora Linux <br />
        <input type="checkbox" value="Linux Networking" name="books[]"/> Linux Networking<br />
        Comment: <br />
        <textarea cols="50" rows="4" wrap="virtual" name="comment"></textarea> <br />
        <input type="submit" value="Send" />
    </form>
   </body>
</html>
