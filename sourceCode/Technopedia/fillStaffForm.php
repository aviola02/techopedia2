<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/16/2016
 * Time: 11:53 PM
 *
 * This file executes a query to get the details of a given member of the
 * Staff in order to fill the form that is responsible to view them and to
 * edit them.
 *
 */
include "dbAccess.php";
$id= $_REQUEST["q"];


$sql = "Select * From Staff Where Username = "."'".$id."'";

$result = mysqli_query($GLOBALS["dbh"],$sql);
$r = array();
while ($row = mysqli_fetch_assoc($result)){
    $r[]=$row;
}
echo json_encode($r);


mysqli_close($GLOBALS["dbh"]);