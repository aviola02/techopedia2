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

    if($tableName=="Student")
        $sql = "Select * From ".$tableName." WHERE IdentityNo = ".$id;
    else if ($tableName=="Staff")
        $sql = "Select * From ".$tableName." WHERE Username = "."'".$id."'";
    else if ($tableName=="Class") {
        $token = strtok($id, "-");
        $id_table = array();
        while ($token !== false)
        {
            $id_table[] = $token;
            $token = strtok("-");
        }
        $sql = "Select * From Class Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."'";
    }
    $result = mysql_query($sql);
    $r = array();
    while ($row = mysql_fetch_assoc($result)){
        $r[]=$row;
    }
    echo json_encode($r);


    mysql_close($dbh);
