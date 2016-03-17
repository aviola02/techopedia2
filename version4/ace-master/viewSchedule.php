<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/23/2016
 * Time: 8:12 PM
 */

$str = $_REQUEST["q"];

$token = strtok($str, "-");  //initialize variables
$x;
$i=0;
while($token !== false){
    $x[$i] = $token;
    $token = strtok("-");
    $i++;
}
$className = $x[0];
$classNo = $x[1];
if(count($x)== 2)
    $year = date("Y"); //for current year classes
else
    $year = $x[2]; //for classes from previous years

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From Tschedule Where CourseName = '".$className."' And ClassNo = ".$classNo." And Year = ".$year;

$result = mysql_query($sql);


$str2 = '[';
while ($row = mysql_fetch_array($result)){
    $str2 .= '{id:'."\"".$row['ProgramCode']."\",";
    $str2 .= 'topic:'."\"".$row['Topic']."\",";
    $str2 .= 'exercises:'."\"".$row['Exercises']."\",";
    $str2 .= 'notes:'."\"".$row['Notes']."\"},";
}

$str2 = substr($str2,0,-1);
$str2 .= ']';

echo $str2;
mysql_close($sql);

//    echo '<tr>
//     <td>'.$row['ProgramCode'].'</td>
//        <td>'.$row['Topic'].'</td>
//        <td>'.$row['Exercises'].'</td>
//        <td>'.$row['Notes'].'</td>
//        <td>'.$row['DocumentPicture'].'</td>
//        <td>'.$row['Date'].'</td>
//        <td>
//        <button class="btn edit"><i class="icon-edit"></i></button>
//        <button class="btn btn-danger remove" data-toggle="confirmation"><i class="icon-remove"></i></button>
//        <button class="btn attendances" onClick = ajaxAttendances('.$row['ProgramCode'].')><i class="icon-user"></i></button>
//        </td>
//
//    </tr>';



