<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/15/2016
 * Time: 12:25 AM
 */
    $tableName = $_REQUEST["q2"];
    $id= $_REQUEST["q"];

    $dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
    or die("Couldn't connect to database.");

    $db = mysql_select_db("technopedia2", $dbh)
    or die("Couldn't select database.");


    $sql = "Select * From ".$tableName." WHERE IdentityNo = ".$id;
    $result = mysql_query($sql);
    $r = array();
    while ($row = mysql_fetch_assoc($result)){
        $r[]=$row;
    }
    echo json_encode($r);


    mysql_close($dbh);
