<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/7/2016
 * Time: 5:02 PM
 *
 * This file implements the dynamic edit of attendances. Its main
 * purpose is to make possible the edit with out submit, only by checking
 * and un-checking checkboxes.
 *
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


$sql = "UPDATE Attendances SET Attendance = '".$attendance."' WHERE CourseName = '".$className."' AND ClassNo = '".$classNo."' AND Year = '".$year."' AND ProgramCode = '".$pcode."' AND CandidateID = '".$candidateID."'";
mysqli_query($GLOBALS["dbh"],$sql);

mysqli_close($GLOBALS["dbh"]);
