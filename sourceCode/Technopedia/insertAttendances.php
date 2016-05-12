<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/2/2016
 * Time: 2:57 PM
 *
 * This file is responsible to insert an attendance when its checkbox
 * is filled with positive selection.
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

$pcode = $_REQUEST["q2"];


$sql = "Select CandidateID  From ClassStudent Where CourseName = '".$className."' And ClassNo = ".$classNo." And Year = ".$year;
$result = mysqli_query($GLOBALS["dbh"],$sql);

$table = array();

while ($row = mysqli_fetch_array($result)){
    $table[]=$row[0];
}

$i=0;

while($i < count($table)){
    $sql = "INSERT INTO Attendances (CourseName, ClassNo, Year, ProgramCode ,CandidateID, Attendance) VALUES ( '".$className."', '".$classNo."', '".$year."', '".$pcode."', '".$table[$i]."', '0')";
    mysqli_query($GLOBALS["dbh"],$sql);
    $i++;
}

mysqli_close($GLOBALS["dbh"]);
