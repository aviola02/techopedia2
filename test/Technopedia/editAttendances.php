<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/7/2016
 * Time: 5:02 PM
 */

include "dbAccess.php";

$str = $_REQUEST["q"];
$pcode = $_REQUEST["q2"];
$candidateID = $_REQUEST["q3"];
$attendance = $_REQUEST["q4"];

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

$sql = "UPDATE Attendances SET Attendance = '".$attendance."' WHERE CourseName = '".$className."' AND ClassNo = '".$classNo."' AND Year = '".$year."' AND ProgramCode = '".$pcode."' AND CandidateID = '".$candidateID."'";
mysql_query($sql);
