<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/27/2016
 * Time: 4:59 PM
 */

$str = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select FirstName, LastName, Type, MobilePhone, Email From " .$str;

$result = mysql_query($sql);



while ($row = mysql_fetch_array($result)){


    /*echo 'document.getElementById("tableBody").innerHTML += "<tr> <td>'.$row['ProgramCode'].'</td> </tr>";';*/


    echo '<tr>
     <td>'.$row['FirstName'].'</td>
        <td>'.$row['LastName'].'</td>
        <td>'.$row['Type'].'</td>
        <td>'.$row['MobilePhone'].'</td>
        <td>'.$row['Email'].'</td>
        <td>
        <button class="btn edit"><i class="icon-edit"></i></button>
        <button class="btn btn-danger remove" data-toggle="confirmation"><i class="icon-remove"></i></button>
        </td>

    </tr>';




}


mysql_close($sql);




