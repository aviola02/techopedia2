<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/19/16
 * Time: 6:49 PM
 *
 * This file is responsible to retrieve data from the data base about
 * a class and return them in the appropriate format in order to be used.
 *
 */
include "dbAccess.php";
$str = $_REQUEST["q"];

$sql = "Select * From ".$str;

$result = mysqli_query($GLOBALS["dbh"],$sql);

$str2="[";

while ($row = mysqli_fetch_array($result)){

    $str2 .= '{id:'."'".$row['CourseName']."-".$row['ClassNo']."-".$row['Year']."',";
    $str2 .= 'room:'."'".$row['RoomNo']."',";
    $str2 .= 'teacher:'."'".$row['TeacherUsername']."',";
    $str2 .= 'days:'."'".$row['Days']."',";
    $str2 .= 'startsat:'."'".$row['StartTime']."',";
    $str2 .= 'endsat:'."'".$row['EndTime']."'},";

}
$str2.="]";
echo $str2;
mysqli_close($GLOBALS["dbh"]);
