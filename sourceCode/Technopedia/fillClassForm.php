<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/22/2016
 * Time: 8:45 PM
 *
 * This file executes a query to get the details of a given class
 * in order to fill the form that is responsible to view them and to
 * edit them.
 *
 */
include 'dbAccess.php';
$id= $_REQUEST["q"];
$token = strtok($id, "-");
$id_table = array();
while ($token !== false)
{
    $id_table[] = $token;
    $token = strtok("-");
}


$sql = "Select * From Class Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."'";
$result = mysqli_query($GLOBALS["dbh"],$sql);
$r = array();
while ($row = mysqli_fetch_assoc($result)){
    $r[]=$row;
}
echo json_encode($r);

mysqli_close($GLOBALS["dbh"]);