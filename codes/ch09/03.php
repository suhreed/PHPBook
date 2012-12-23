<html>
   <head>
      <title>Example Form - Multiple Select</title>
    </head>
   <body>
   <h2>Example Form: Multiple Select</h2>
    <form action="process2.php" method="post">
        User Name: <br />
        <input type="text" size="20" name="user" /> <br />
        Books in collection: <br />
        <select size="5" name="books[]" multiple>
    			<option>Web Publishing</option>
    			<option>Expert Networking</option>
    			<option>Joomla! E-commerce with VirtueMart</option>
    			<option>Windows 2000 Professional</option>
    			<option>XML</option>
    			<option>Joomla! with Flash</option>
    			<option>Red Hat/Fedora Linux</option>
    			<option>Linux Networking</option>
    			<option>Cisco Networking</option>
        </select> <br />
        Comment: <br />
        <textarea cols="50" rows="8" wrap="virtual" name="comment"></textarea> <br />
        <input type="submit" value="Send" />
    </form>
   </body>
</html>
