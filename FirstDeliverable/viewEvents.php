<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/16/16
 * Time: 4:59 PM
 */

$str = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From " .$str;

$result = mysql_query($sql);


while ($row = mysql_fetch_array($result)){

    $str2 .= '{id:'."'".$row['Number']."',";
    $str2 .= 'title:'."'".$row['Name']."',";
    $str2 .= 'start: new Date('."'".$row['Date']."T".$row['StartTime']."'),";
    $str2 .= 'end: new Date('."'".$row['Date']."T".$row['EndTime']."'),";
    $str2 .= 'location:'."'".$row['Location']."',";
    $str2 .= 'color:'."'#d15b47"."',";
    $str2 .= 'description:'."'".$row['EventDescription']."'},";

}

echo $str2;
mysql_close($dbh);
