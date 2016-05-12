<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/25/2016
 * Time: 7:43 PM
 *
 * This file executes a query to get the details of a given Schedule
 * (instance of a class/lecture) in order to fill the form that is
 * responsible to view them and to edit them.
 *
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



$sql = "Select * From Tschedule Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."' AND ProgramCode = '".$id."'";
$result = mysqli_query($GLOBALS["dbh"],$sql);
$r = array();
while ($row = mysqli_fetch_assoc($result)){
    $r[]=$row;
}
echo json_encode($r);

mysqli_close($GLOBALS["dbh"]);