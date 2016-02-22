<html>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/15/2016
 * Time: 12:25 AM
 */

$str="field";
$count=0;
$table;
$tableName = "ClassCourse";

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");


$sql = "Select * From ".$tableName;

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
    $table[$count]=$row;
    $count++;
}

mysql_close($dbh);

include "dbManipulation.php";

view($table, $tableName);

?>

</body>
</html>