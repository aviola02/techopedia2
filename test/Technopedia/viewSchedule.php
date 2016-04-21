<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/23/2016
 * Time: 8:12 PM
 */

include "dbAccess.php";
$str = $_REQUEST["q"];

$token = strtok($str, "-");  //initialize variables
$x;
$i=0;
while($token !== false){
    $x[$i] = $token;
    $token = strtok("-");
    $i++;
}
$className = $x[0];
$classNo = $x[1];
if(count($x)== 2)
    $year = date("Y"); //for current year classes
else
    $year = $x[2]; //for classes from previous years

$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");

$sql = "Select * From Tschedule Where CourseName = '".$className."' And ClassNo = ".$classNo." And Year = ".$year;

$result = mysql_query($sql);


$str2 = '[';
while ($row = mysql_fetch_array($result)){
    $str2 .= '{id:'."\"".$row['ProgramCode']."\",";
    $str2 .= 'topic:'."\"".$row['Topic']."\",";
    $str2 .= 'exercises:'."\"".$row['Exercises']."\",";
    $str2 .= 'notes:'."\"".$row['Notes']."\",";
    $str2 .= 'date:'."\"".$row['Date']."\"},";
}
if ($str2 != "[")
    $str2 = substr($str2,0,-1);

$str2 .= ']';

echo $str2;
mysql_close($sql);
