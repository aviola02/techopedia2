<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/27/2016
 * Time: 5:57 PM
 */

$progCode = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From ScheduleStudent Where ProgramCode = ".$progCode;

$result = mysql_query($sql);



while ($row = mysql_fetch_array($result)){
    $ch="";
    if ($row['Present'] == 1)
        $ch = "checked";

    echo '<tr>
     <td>'.$row['FirstNameEnglish'].'</td>
        <td>'.$row['LastNameEnglish'].'</td>
        <td><input type = "checkbox" '.$ch.' ></td></td>

    </tr>';




}


mysql_close($sql);




