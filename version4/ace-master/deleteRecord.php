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

$sql = "Delete From ".$tableName." Where IdentityNo = ".$id;
echo $sql;
mysql_query($sql);


mysql_close($sql);