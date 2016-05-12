<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/2/2016
 * Time: 7:38 PM
 *
 * This file executes a query to get the details of a given Student
 * in order to fill the form that is responsible to view them and to
 * edit them.
 *
 */
include "dbAccess.php";
$id= $_REQUEST["q"];

mysqli_set_charset($GLOBALS["dbh"],'utf8');
$sql = "Select * From Student Where IdentityNo = '".$id."'";
$result = mysqli_query($GLOBALS["dbh"],$sql);
$r = array();
while ($row = mysqli_fetch_assoc($result)){
   $r[]=$row;
}
echo json_encode($r);


mysqli_close($GLOBALS["dbh"]);
