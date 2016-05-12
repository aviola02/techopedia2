<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/23/2016
 * Time: 8:12 PM
 *
 * This file is responsible to retrieve data from the data base about
 * a schedule and return them in the appropriate format in order to be used.
 *
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

$sql = "Select * From Tschedule Where CourseName = '".$className."' And ClassNo = ".$classNo." And Year = ".$year;

$result = mysqli_query($GLOBALS["dbh"],$sql);


$str2 = '[';
while ($row = mysqli_fetch_array($result)){
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
mysqli_close($GLOBALS["dbh"]);
