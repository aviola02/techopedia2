<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 4/1/16
 * Time: 9:03 PM
 *
 * Implementation about removing(deleting) a participation of
 * a particular student in a specific class.
 *
 */
include "dbAccess.php";


$query = 'DELETE FROM ClassStudent WHERE CourseName=';
$courseName='\''.$_POST['field0'].'\' AND ClassNo=';
$classNo=$_POST['field1'].' AND Year=';
$year=$_POST['field2'].' AND CandidateID=';
$candidate='\''.$_POST['field3'].'\'';
$query.=$courseName.$classNo.$year.$candidate;

echo $query;

mysqli_query($GLOBALS["dbh"],$query);

$query = 'DELETE FROM Attendances WHERE CourseName=';
$query.=$courseName.$classNo.$year.$candidate;

mysqli_query($GLOBALS["dbh"],$query);

mysqli_close($GLOBALS["dbh"]);

