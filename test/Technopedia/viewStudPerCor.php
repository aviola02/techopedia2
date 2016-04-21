<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/23/2016
 * Time: 8:12 PM
 */
include "dbAccess.php";
$str = $_REQUEST["q"];

$token = strtok($str, "-");  //initialize variables
$x;
$i=0;
while($token !== false){
    $x[$i] = $token;
    $token = strtok("-");
    $i++;
}
$pcode;
$className = $x[0];
$classNo = $x[1];
if(count($x)== 3) {
    $year = date("Y"); //for current year classes
    $pcode = $x[2];
}
else {
    $year = $x[2];//for classes from previous years
    $pcode = $x[3];
}
$dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
or die("Couldn't connect to database.");

$db = mysql_select_db($GLOBALS["DBName"], $dbh)
or die("Couldn't select database.");

$sql = "Select Student.CandidateID, Student.FirstNameEnglish, Student.LastNameEnglish, Attendances.Attendance From Attendances, Student Where Student.CandidateID=Attendances.CandidateID AND Attendances.CourseName = '".$className."' And Attendances.ClassNo = ".$classNo." And Attendances.Year = ".$year." AND Attendances.ProgramCode = ".$pcode;

$result = mysql_query($sql);


$str2 = '[';


while ($row = mysql_fetch_array($result)){
    $str2 .= '{id:'."\"".$row['CandidateID']."\",";
    $str2 .= 'FirstName:'."\"".$row['FirstNameEnglish']."\",";
    $str2 .= 'LastName:'."\"".$row['LastNameEnglish']."\",";
    if($row['Attendance'] == '0')
        $str2 .= 'CheckBox:'."\"NO\"},";
    else
        $str2 .= 'CheckBox:'."\"YES\"},";
}

if (strlen($str2)!=1){
    $str2 = substr($str2,0,-1);
}

$str2 .= ']';

echo $str2;
mysql_close($sql);




