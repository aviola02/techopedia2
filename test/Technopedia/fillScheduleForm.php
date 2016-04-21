<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/25/2016
 * Time: 7:43 PM
 */
include "dbAccess.php";
$id= $_REQUEST["q"];
$classTitle = $_REQUEST["q2"];
$token = strtok($classTitle, "-");
$id_table = array();
while ($token !== false)
{
    $id_table[] = $token;
    $token = strtok("-");
}
if(count($id_table)== 2)
    $id_table[] = date("Y");


$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");

$sql = "Select * From Tschedule Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."' AND ProgramCode = '".$id."'";
$result = mysql_query($sql);
$r = array();
while ($row = mysql_fetch_assoc($result)){
    $r[]=$row;
}
echo json_encode($r);