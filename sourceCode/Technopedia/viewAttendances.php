<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 4/17/16
 * Time: 6:11 PM
 *
 * This file is responsible to retrieve from the data base the attendances
 * of a student that is attending a specific class.
 *
 */

include "dbAccess.php";

$str = $_REQUEST["q"];

$sql = "Select FirstNameEnglish, LastNameEnglish, `Attendances`.CandidateID, `Attendances`.CourseName, `Attendances`.ClassNo, `Attendances`.Year, `Attendances`.ProgramCode, Date, Attendance FROM `Attendances`, `Tschedule`, `Student` WHERE `Attendances`.CandidateID=`Student`.CandidateID and `Attendances`.CourseName=`Tschedule`.CourseName and `Attendances`.ClassNo=`Tschedule`.ClassNo and `Attendances`.Year=`Tschedule`.Year and `Attendances`.ProgramCode=`Tschedule`.ProgramCode";

$result = mysqli_query($GLOBALS["dbh"],$sql);


$str2 = '[';
while ($row = mysqli_fetch_array($result)){

    $str2 .= '{fName:'."\"".$row['FirstNameEnglish']."\",";
    $str2 .= 'lName:'."\"".$row['LastNameEnglish']."\",";
    $str2 .= 'id:'."\"".$row['CandidateID']."\",";
    $str2 .= 'CourseName:'."\"".$row['CourseName']."\",";
    $str2 .= 'ClassNo:'."\"".$row['ClassNo']."\",";
    $str2 .= 'Year:'."\"".$row['Year']."\",";
    $str2 .= 'ProgramCode:'."\"".$row['ProgramCode']."\",";
    $str2 .= 'Date:'."\"".$row['Date']."\",";
    $str2 .= 'Attendance:'."\"".$row['Attendance']."\"},";

}

if ($str2 != "[")
    $str2 = substr($str2,0,-1);

$str2 .= ']';


echo $str2;
mysqli_close($GLOBALS["dbh"]);