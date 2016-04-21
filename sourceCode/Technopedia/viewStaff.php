<?php
include "dbAccess.php";

$str = $_REQUEST["q"];

$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");

$sql = "Select Username, FirstName, LastName, MobilePhone, Email From " .$str;

$result = mysql_query($sql);


$str2 = '[';
while ($row = mysql_fetch_array($result)){

    $str2 .= '{fName:'."\"".$row['FirstName']."\",";
    $str2 .= 'lName:'."\"".$row['LastName']."\",";
    $str2 .= 'id:'."\"".$row['Username']."\",";
    $str2 .= 'Phone:'."\"".$row['MobilePhone']."\",";
    $str2 .= 'email:'."\"".$row['Email']."\"},";

}

$str2 = substr($str2,0,-1);
$str2 .= ']';


echo $str2;
mysql_close($dbh);