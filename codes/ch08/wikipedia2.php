<?PHP
include 'wikipedia.class.php';
echo <<<EOT
<html>
<head><title>Online Encyclopaedia</title></head>
<body>
<center>
<h1>Online Free Encyclopaedia</h1>
<form action="$_SERVER[PHP_SELF]" method=POST>
Search for: <input type=text name=term>
<input type=submit>
</form>
</center>";
EOT;
$term = $_POST['term'];
$term = str_replace(" ","_", $term);

$x = new wikipedia('http://en.wikipedia.org/');
echo $x->get_page($term);

echo "</body></html>";

?>