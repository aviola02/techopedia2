<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/25/16
 * Time: 10:35 PM
 */


$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$columns = "INSERT INTO ClassStudent (CourseName, ClassNo, Year, CandidateID) VALUES (";

$str = $_GET['class'];
//$str='EPL371-1-2016, EPL342-2-2016, EPL361-3-2015, EPL361-4-2015,+685512-Giorgos-Andreou,99999-Nicos-Andreou,Kapoios-Kapoiou-1234567,';
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
        mysql_query($query);
        $query=$columns;
//        echo $classes[$i].'---------'.$students[$j];
    }
}

mysql_close($dbh);
