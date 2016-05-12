<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/25/16
 * Time: 10:35 PM
 *
 * This file is responsible to push into the data base multiple
 * Classes. Specifically the classes added here are the classes that are
 * going to be matched with student that are going to attend them.
 *
 */
include "dbAccess.php";


$columns = "INSERT INTO ClassStudent (CourseName, ClassNo, Year, CandidateID) VALUES (";

$str = $_GET['class'];
$array=explode('!',$str);

$classes=explode(',',$array[0]);
$students=explode(',',$array[1]);

for ($i=0;$i<sizeof($classes)-1;$i++){
    $query=$columns;
    $classInsertion =explode('-',$classes[$i]);
    for ($j=0;$j<sizeof($students)-1;$j++){

        $studentsInsertion=explode('-',$students[$j]);

        $query.='\''.trim($classInsertion[0]," ").'\',';
        $query.=trim($classInsertion[1]," ").',';
        $query.=trim($classInsertion[2]," ").',';
        $query.=trim($studentsInsertion[0]," ").')';
        echo $query;
        mysqli_query($GLOBALS["dbh"],$query);
        $query=$columns;
    }
}

mysqli_close($GLOBALS["dbh"]);
