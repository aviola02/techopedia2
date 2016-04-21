<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/2/2016
 * Time: 7:38 PM
 */
include "dbAccess.php";
$id= $_REQUEST["q"];

$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");
mysql_set_charset('utf8');
$sql = "Select * From Student Where IdentityNo = '".$id."'";
$result = mysql_query($sql);
$r = array();
while ($row = mysql_fetch_assoc($result)){
   $r[]=$row;
}
echo json_encode($r);


mysql_close($sql);
