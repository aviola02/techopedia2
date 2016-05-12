<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/17/16
 * Time: 3:09 PM
 *
 * This file is responsible to retrieve data from the data base about
 * an exam and return them in the appropriate format in order to be used.
 *
 */
include "dbAccess.php";

$str = $_REQUEST["q"];

$sql = "Select * From " .$str;

$result = mysqli_query($GLOBALS["dbh"],$sql);


while ($row = mysqli_fetch_array($result)){

    $str2 .= '{id:'."'".$row['ModuleCode']." ".$row['ExamCode']."',";
    $str2 .= 'title:'."'".$row['ExamTitle']."',";
    $str2 .= 'start: new Date('."'".$row['ExamSessionDate']."T".$row['StartTime']."'),";
    $str2 .= 'location:'."'".$row['TestCenterName']."',";
    $str2 .= 'color:'."'#a0a0a0"."',";
    $str2 .= 'description:'."'".$row['ModuleDescription']."'},";

}

$str2 = substr($str2,0,-1);

echo $str2;
mysqli_close($GLOBALS["dbh"]);
