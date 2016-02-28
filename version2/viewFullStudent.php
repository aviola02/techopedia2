<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/27/2016
 * Time: 9:55 PM
 */

$str = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From " .$str;

$result = mysql_query($sql);



while ($row = mysql_fetch_array($result)){


    /*echo 'document.getElementById("tableBody").innerHTML += "<tr> <td>'.$row['ProgramCode'].'</td> </tr>";';*/


    echo '<tr>
     <td>'.$row['FirstNameEnglish'].'</td>
        <td>'.$row['LastNameEnglish'].'</td>
        <td>'.$row['IdentityNo'].'</td>
        <td>'.$row['ECDL_LogbookNo'].'</td>
        <td>
        <button class="btn edit"><i class="icon-edit"></i></button>
        <button class="btn btn-danger remove" data-toggle="confirmation"><i class="icon-remove"></i></button>
        <button class="btn attendances" ><i class="icon-user"></i></button>
        </td>

    </tr>';




}


mysql_close($sql);




