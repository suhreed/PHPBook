<html>
   <head>
      <title>Example Form Processor (Process All Fields)</title>
    </head>
   <body>
      <h2>Example Form Processor: Process all fields</h2>
    <?php
      echo "<p>Here are the fields and values: <ul>";
      foreach ($_POST as $key=>$value) {
      if (gettype($value) == "array") {
        echo "<li>$key == <br /> <ol>";
        foreach ($value as $val){
          echo "<li> $val";
        }
        echo "</ol>";
      } else {
        echo "<li>$key == $value <br />";
        }
     }
    echo "</ul>";
  ?>
   </body>
</html>
