<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 4/1/16
 * Time: 9:03 PM
 */
include "dbAccess.php";
$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");

$query = 'DELETE FROM ClassStudent WHERE CourseName=';
$courseName='\''.$_POST['field0'].'\' AND ClassNo=';
$classNo=$_POST['field1'].' AND Year=';
$year=$_POST['field2'].' AND CandidateID=';
$candidate='\''.$_POST['field3'].'\'';
$query.=$courseName.$classNo.$year.$candidate;

echo $query;

mysql_query($query);

$query = 'DELETE FROM Attendances WHERE CourseName=';
$query.=$courseName.$classNo.$year.$candidate;

mysql_query($query);

mysql_close($dbh);

