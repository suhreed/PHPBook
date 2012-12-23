<?PHP
$host = "localhost"; // db host
$user = "root"; // db username
$pass = ""; // db password
$db = "gallery"; // db name
$mysql_link = mysql_connect($host,$user, $pass); 
mysql_select_db($db, $mysql_link) or die('Could not select database'); 

$images_dir = 'photos'; 

?>