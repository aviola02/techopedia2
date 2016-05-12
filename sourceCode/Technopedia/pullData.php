<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/15/2016
 * Time: 12:25 AM
 *
 * This file is responsible to execute queries and pull from the database
 * specific data Classes and the Schedule of Classes. With schedule is meant
 * a specific instance of the class.
 *
 */
include "dbAccess.php";
    $tableName = $_REQUEST["q2"];
    $id= $_REQUEST["q"];

    mysqli_set_charset($GLOBALS["dbh"],'utf8');
    if($tableName=="Student")
        $sql = "Select * From ".$tableName." WHERE IdentityNo = '".$id."'";
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
    else if ($tableName=="Tschedule") {
        $id2= $_REQUEST["q3"];
        $token = strtok($id, "-");
        $id_table = array();
        while ($token !== false)
        {
            $id_table[] = $token;
            $token = strtok("-");
        }
        if(count($id_table)== 2)
            $id_table[] = date("Y");
        $sql = "Select * From Tschedule Where CourseName = "."'".$id_table[0]."' AND ClassNo = "."'".$id_table[1]."' AND Year = "."'".$id_table[2]."' AND ProgramCode = '".$id2."'";
    }
    $result = mysqli_query($GLOBALS["dbh"],$sql);
    $r = array();
    while ($row = mysqli_fetch_assoc($result)){
        $r[]=$row;
    }


    echo json_encode($r);


    mysqli_close($GLOBALS["dbh"]);
