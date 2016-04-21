<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/19/16
 * Time: 6:49 PM
 */

$str = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From ".$str;

$result = mysql_query($sql);

$str2="[";

while ($row = mysql_fetch_array($result)){

    $str2 .= '{id:'."'".$row['CourseName']."-".$row['ClassNo']."-".$row['Year']."',";
    $str2 .= 'room:'."'".$row['RoomNo']."',";
    $str2 .= 'teacher:'."'".$row['TeacherUsername']."',";
    $str2 .= 'days:'."'".$row['Days']."',";
    $str2 .= 'startsat:'."'".$row['StartTime']."',";
    $str2 .= 'endsat:'."'".$row['EndTime']."'},";

}
$str2.="]";
echo $str2;
mysql_close($dbh);
