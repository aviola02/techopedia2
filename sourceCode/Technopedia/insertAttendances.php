<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/2/2016
 * Time: 2:57 PM
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

$pcode = $_REQUEST["q2"];

$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");

$sql = "Select CandidateID  From ClassStudent Where CourseName = '".$className."' And ClassNo = ".$classNo." And Year = ".$year;
$result = mysql_query($sql);

$table = array();

while ($row = mysql_fetch_array($result)){
    $table[]=$row[0];
}

$i=0;

while($i < count($table)){
    $sql = "INSERT INTO Attendances (CourseName, ClassNo, Year, ProgramCode ,CandidateID, Attendance) VALUES ( '".$className."', '".$classNo."', '".$year."', '".$pcode."', '".$table[$i]."', '0')";
    mysql_query($sql);
    $i++;
}

mysql_close($sql);
