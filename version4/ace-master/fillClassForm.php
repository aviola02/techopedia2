<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/22/2016
 * Time: 8:45 PM
 */
$id= $_REQUEST["q"];
$token = strtok($id, "-");
$id_table = array();
while ($token !== false)
{
    $id_table[] = $token;
    $token = strtok("-");
}

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From Class Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."'";
$result = mysql_query($sql);
$r = array();
while ($row = mysql_fetch_assoc($result)){
    $r[]=$row;
}
echo json_encode($r);