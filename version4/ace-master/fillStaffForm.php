<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/16/2016
 * Time: 11:53 PM
 */
$id= $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From Staff Where Username = "."'".$id."'";
$result = mysql_query($sql);
$r = array();
while ($row = mysql_fetch_assoc($result)){
    $r[]=$row;
}
echo json_encode($r);


mysql_close($sql);