<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/14/16
 * Time: 4:25 PM
 *
 *
 * This file contains the implementation of manipulating
 * the Data Base of the System. In particular, here we have
 * the implementation of every insert record to a Data Base Table, edit record
 * from a Data Base Table, view a record of a Data Base Table. This file,
 * also contains the login validation.
 *
 *
 */
include "dbAccess.php";
$username;
$GLOBALS['$username'];

/**
 *
 * Insert a record into a specific Data Base Table.
 *
 * @param $table
 * @param $tableName
 */
function insert($table, $tableName){

    if ($tableName == "Class")
        $table[0]=preg_replace('/\s+/', '', $table[0]);

    $columns = "INSERT INTO ".$tableName." (";

    $readColNames = "SHOW COLUMNS FROM ".$tableName;
    $result = mysqli_query($GLOBALS["dbh"],$readColNames);
    while($row = mysqli_fetch_array($result))
        $columns.=$row['Field'].",";

    $columns = rtrim($columns,",");
    $columns=$columns.") VALUES (";

    foreach ($table as $value) {
        $columns.="'".$value."',"; //Maybe it need \ before '
    }

    $columns = rtrim($columns,",");
    $columns=$columns.");";



    echo $columns;

    mysqli_set_charset($GLOBALS["dbh"],'utf8');
    mysqli_query($GLOBALS["dbh"],$columns);
    mysqli_close($GLOBALS["dbh"]);

}

/**
 *
 * Edit a record from a specific Data Base Table.
 *
 * @param $table
 * @param $tableName
 */
function edit($table, $tableName){

    if($tableName == "Profile"){
        //$table[1]=md5($table[1]);
        $tableName="Staff";
    }
    $i=0;
    $columns = "UPDATE ".$tableName." SET ";

    $readColNames = "SHOW COLUMNS FROM ".$tableName;
    $result = mysqli_query($GLOBALS["dbh"],$readColNames);

    while($row = mysqli_fetch_array($result)) {
        $columns .= $row['Field'] . ' = "' . $table[$i].'", ';
        $i++;
    }

    $columns = substr($columns,0,strlen($columns) - 2);

    $columns=$columns." WHERE ";
    if ($tableName == "Student"){
        $columns.="CandidateID = ".$table[0];
    }
    elseif($tableName == "Staff")
        $columns.="Username = '".$table[0]."'";
    elseif ($tableName == "Event")
        $columns.="Number = ".$table[0];
    elseif ($tableName == "Exam")
        $columns.="ExamCode = ".$table[0];
    elseif ($tableName == "Class")
        $columns.="CourseName = '".$table[0]."' AND ClassNo = ".$table[1]." AND Year = ".$table[2];
    elseif ($tableName == "Tschedule")
        $columns.="CourseName = '".$table[0]."' AND ClassNo = ".$table[1]." AND Year = ".$table[2]." AND ProgramCode = ".$table[3];

    echo $columns;
    mysqli_set_charset($GLOBALS["dbh"],'utf8');
    mysqli_query($GLOBALS["dbh"],$columns);

    mysqli_close($GLOBALS["dbh"]);

}


/**
 *
 * View a record from a specific Data Base Table.
 *
 * @param $table
 * @param $tableName
 */
function view($table, $tableName){
    $columns = null;
    $count = 0;

    mysqli_set_charset($GLOBALS["dbh"],'utf8');
    $readColNames = "SHOW COLUMNS FROM ".$tableName;
    $result = mysqli_query($GLOBALS["dbh"],$readColNames);
    $result = mysqli_query($GLOBALS["dbh"],$readColNames);


    while($row = mysqli_fetch_array($result)){
        $columns[$count]=$row['Field'];
        $count++;
    }



    $i=0;
    $j=0;
    foreach($table as $value){
        foreach($columns as $value2){
            $results[$i][$j]= $value[$value2].' ';
            $j++;
        }
        $i++;
        $j=0;
    }


    return $results;


    mysqli_close($GLOBALS["dbh"]);
}

/**
 *
 * Check the validity of an attempt to login.
 *
 * @param $username
 * @param $password
 */
function checkValidLogin($username, $password){


    $tableName = "Staff";
    $sql = "Select * From ".$tableName." Where "."`Username` = '".$username."' and `StaffPassword` = '".md5($password)."'";
    $result = mysqli_query($GLOBALS["dbh"],$sql);
   if (mysqli_num_rows($result) == 0){ // if the login is invalid
               include "login2.html";
                echo '
                    <script type="text/javascript">
                    document.getElementById("msgBox").style.visibility = "visible";
                    </script>';
    }
    else { //if the login is valid
        while ($row = mysqli_fetch_array($result)) {
            $username = $row['Username'];
            $type = $row['Type'];

            session_start();
            $_SESSION["username"] =$row['Username'];
            $_SESSION["Type"]=$row['Type'];
            $_SESSION["FirstName"]=$row['FirstName'];
            $_SESSION["LastName"]=$row['LastName'];
            $_SESSION["DateOfBirth"]=$row['DateOfBirth'];
            $_SESSION["MobilePhone"]=$row['MobilePhone'];
            $_SESSION["Email"]=$row['Email'];

            switch($type){
                case 'Admin':{ //if user is admin
                    Include "Administrator.php";
                    break;
                }
                case 'Secretary':{ //if user is secretary

                    Include "Secretary.php";
                    break;
                }
                case 'Teacher':{ //if user is teacher

                    Include "Teacher.php";
                    break;
                }
            }

        }
    }
}



