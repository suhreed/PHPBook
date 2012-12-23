<?php

function print_header() {
	echo "<html"
		."<head>"
		."<style>"
		." td {vertical-align:top;}"
		." table { border-right-color:Blue;}"
		." div.tables { background-color:Gold}"
		." div.dbs { background-color:Silver}"
		." div.fields { background-color:Pink}"
		."</style>"
		."<title>MySQL Database Structure Browser</title>"
		."</head>"
		."<body>"
		."<h1>Database Structure Browser</h1>"
		."<a href=\"$_SERVER[PHP_SELF]\">Home</a>";
}

function print_footer () {
	echo "</body>"
		."</html>";
}

//select db names and populates options
function populate_dbs() {
	$host = "localhost";
    $user = "root";
    $link = mysql_connect($host, $user) or die("Couldn't connect".mysql_error());
	$dbs = mysql_list_dbs($link);
    echo "<div class=dbs>";
    echo "<b>Select a Database:</b><br/>";
	$num_dbs = mysql_num_rows($dbs);
	for ($i = 0; $i < $num_dbs; $i++) {
   		$dbname = mysql_db_name($dbs,$i);
   		echo "<a href=\"$_SERVER[PHP_SELF]?db=$dbname\">$dbname</a><br/>";
   }
   echo "</div>";
   mysql_close($link);
}


//select tables in $db

function populate_tables($db) {
	$host = "localhost";
    $user = "root";
    $link = mysql_connect($host, $user) or die("Couldn't connect".mysql_error());
	$sql = "SHOW TABLES FROM $db";
    $result = mysql_query($sql);
  
   echo "<div class=\"tables\">";
   echo "<b>Tables in $db :</b><br/>";
   while ($row = mysql_fetch_row($result)) {
           echo "<a href=\"$_SERVER[PHP_SELF]?db=$db&table={$row[0]}\">{$row[0]}</a><br>";
        }
    
    echo "</div>";
    mysql_free_result($result);
    mysql_close($link);
}

//populate fields for $db, $table
function populate_fields($db, $table) {
	$host = "localhost";
    $user = "root";
    $link = mysql_connect($host, $user) or die("Couldn't connect".mysql_error());
    mysql_select_db($db);
	$result = mysql_query("SELECT * FROM $table");
    $num_fields = mysql_num_fields($result);
    echo "<div class=fields>";
    echo "<b>Fields in $table :<b><br/>";
    echo "<table>";
    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td>Length</td>";
    echo "<td>Types</td>";
    echo "<td>Flags</td>";
    echo "</tr>";
    
for ($i=0; $i<$num_fields; $i++){
	echo "<tr>";
	echo "<td>".mysql_field_name($result,$i)."</td>";
	echo "<td>".mysql_field_len($result,$i)."</td>";
	echo "<td>".mysql_field_type($result,$i)."</td>";
	echo "<td>".mysql_field_flags($result,$i)."</td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";
mysql_close($link);

}

//for screen output
print_header();
echo "<table><tr>";
if (isset($_GET['db']) && isset($_GET['table'])) {
	echo "<td>";
	populate_dbs();
	echo "</td><td>";
	populate_tables($_GET['db']);
	echo "</td><td>";
	populate_fields($_GET['db'], $_GET['table']);
	echo "</td>";
} elseif ((isset($_GET['db']))) {
	echo "<td>";
	populate_dbs();
	echo "</td><td>";
	populate_tables($_GET['db']);
	echo "</td>";
} else {
	echo "<td>";
	populate_dbs();
	echo "</td>";
}
echo "</tr></table>";

print_footer();

?>