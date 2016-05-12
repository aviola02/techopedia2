<?php

/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/25/16
 * Time: 11:00 PM
 *
 * This file is responsible to retrieve data from the data base about
 * a member of the staff and return them in the appropriate format in order to be used.
 *
 */

include "dbAccess.php";

$str = $_REQUEST["q"];

$sql = "Select Username, FirstName, LastName, MobilePhone, Email From " .$str;

$result = mysqli_query($GLOBALS["dbh"],$sql);


$str2 = '[';
while ($row = mysqli_fetch_array($result)){

    $str2 .= '{fName:'."\"".$row['FirstName']."\",";
    $str2 .= 'lName:'."\"".$row['LastName']."\",";
    $str2 .= 'id:'."\"".$row['Username']."\",";
    $str2 .= 'Phone:'."\"".$row['MobilePhone']."\",";
    $str2 .= 'email:'."\"".$row['Email']."\"},";

}

$str2 = substr($str2,0,-1);
$str2 .= ']';


echo $str2;
mysqli_close($GLOBALS["dbh"]);