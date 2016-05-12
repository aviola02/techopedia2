<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/2/2016
 * Time: 4:39 PM
 *
 * This file implements the dynamic deletion of attendances. Its main
 * purpose is to make possible the deletion with out submit, only by checking
 * and un-checking checkboxes.
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


$sql = "DELETE FROM Attendances  WHERE CourseName = '".$className."' AND ClassNo = '".$classNo."' AND Year = '".$year."' AND ProgramCode = '".$pcode."'";
mysqli_query($GLOBALS["dbh"],$sql);



mysqli_close($GLOBALS["dbh"]);
