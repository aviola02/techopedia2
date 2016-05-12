<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/16/16
 * Time: 4:59 PM
 *
 * This file is responsible to retrieve data from the data base about
 * an event and return them in the appropriate format in order to be used.
 *
 */
include "dbAccess.php";
$str = $_REQUEST["q"];

$sql = "Select * From " .$str;

$result = mysqli_query($GLOBALS["dbh"],$sql);


while ($row = mysqli_fetch_array($result)){

    $str2 .= '{id:'."'".$row['Number']."',";
    $str2 .= 'title:'."'".$row['Name']."',";
    $str2 .= 'start: new Date('."'".$row['Date']."T".$row['StartTime']."'),";
    $str2 .= 'end: new Date('."'".$row['Date']."T".$row['EndTime']."'),";
    $str2 .= 'location:'."'".$row['Location']."',";
    $str2 .= 'color:'."'#d15b47"."',";
    $str2 .= 'description:'."'".$row['EventDescription']."'},";

}

echo $str2;
mysqli_close($GLOBALS["dbh"]);
