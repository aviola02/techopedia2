<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/17/16
 * Time: 3:09 PM
 */


$str = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From " .$str;

$result = mysql_query($sql);


while ($row = mysql_fetch_array($result)){

    $str2 .= '{id:'."'".$row['ModuleCode']." ".$row['ExamCode']."',";
    $str2 .= 'title:'."'".$row['ExamTitle']."',";
    $str2 .= 'start: new Date('."'".$row['ExamSessionDate']."T".$row['StartTime']."'),";
//    $str2 .= 'end: new Date('."'".$row['Date']."T".$row['EndTime']."'),";
    $str2 .= 'location:'."'".$row['TestCenterName']."',";
    $str2 .= 'color:'."'#a0a0a0"."',";
    $str2 .= 'description:'."'".$row['ModuleDescription']."'},";

}

$str2 = substr($str2,0,-1);

echo $str2;
mysql_close($dbh);
