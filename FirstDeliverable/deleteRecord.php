<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/11/2016
 * Time: 9:41 PM
 */

$id = $_REQUEST["q"];
$tableName = $_REQUEST["q2"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");
if ($tableName=="Student")
    $sql = "Delete From ".$tableName." Where IdentityNo = ".$id;
else if($tableName=="Staff")
    $sql = "Delete From ".$tableName." Where Username = "."'".$id."'";
else if($tableName=="Class"){
    $token = strtok($id, "-");
    $id_table = array();
    while ($token !== false)
    {
        $id_table[] = $token;
        $token = strtok("-");
    }
    $sql = "Delete From ".$tableName." Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."'";
}
else if($tableName=="Tschedule"){
    $id2= $_REQUEST["q3"];
    $token = strtok($id, "-");
    $id_table = array();
    while ($token !== false)
    {
        $id_table[] = $token;
        $token = strtok("-");
    }
    if(count($id_table)== 2)
        $id_table[] = date("Y");
    $sql = "Delete From ".$tableName." Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."' AND ProgramCode = '".$id2."'";
}
else if($tableName=="Event")
    $sql = "Delete From ".$tableName." Where Number = ".$id;
else if($tableName=="Exam")
    $sql = "Delete From ".$tableName." Where ExamCode = ".$id;

echo $sql;
mysql_query($sql);

