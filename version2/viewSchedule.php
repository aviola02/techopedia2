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
$year = date("Y");

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From Tschedule Where CourseName = '".$className."' And ClassNo = ".$classNo." And Year = ".$year;

$result = mysql_query($sql);


while ($row = mysql_fetch_array($result)){

    /*echo 'document.getElementById("tableBody").innerHTML += "<tr> <td>'.$row['ProgramCode'].'</td> </tr>";';*/


    echo '<tr>
     <td class="sorting_1">'.$row['ProgramCode'].'</td>
        <td>'.$row['Topic'].'</td>
        <td>'.$row['Exercises'].'</td>
        <td>'.$row['Notes'].'</td>
        <td>'.$row['DocumentPicture'].'</td>
        <td>'.$row['Date'].'</td>
        <td>
        <button class="btn edit"><i class="icon-edit"></i></button>
        <button class="btn btn-danger remove" data-toggle="confirmation"><i class="icon-remove"></i></button>
        </td>

    </tr>';


}


mysql_close($sql);




