
<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/14/16
 * Time: 4:25 PM
 */
$username;
$GLOBALS['$username'];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

function insert($table, $tableName){

    $dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
    or die("Couldn't connect to database.");

    $db = mysql_select_db("technopedia2", $dbh)
    or die("Couldn't select database.");


    $columns = "INSERT INTO ".$tableName." (";

    $readColNames = "SHOW COLUMNS FROM ".$tableName;
    $result = mysql_query($readColNames);
    while($row = mysql_fetch_array($result))
        $columns.=$row['Field'].",";

    $columns = rtrim($columns,",");
    $columns=$columns.") VALUES (";

    foreach ($table as $value) {
        $columns.="'".$value."',"; //Maybe it need \ before '
    }

    $columns = rtrim($columns,",");
    $columns=$columns.");";


    echo $columns;
    mysql_query($columns);

    mysql_close($dbh);

}

function edit($table, $tableName){

    $dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
    or die("Couldn't connect to database.");

    $db = mysql_select_db("technopedia2", $dbh)
    or die("Couldn't select database.");
    $i=0;

    $columns = "UPDATE ".$tableName." SET ";

    $readColNames = "SHOW COLUMNS FROM ".$tableName;
    $result = mysql_query($readColNames);
    while($row = mysql_fetch_array($result)) {
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
    echo $columns;
    mysql_query($columns);

    mysql_close($dbh);


}

/**
 * @param $table
 * @param $tableName
 */
function view($table, $tableName){
    $columns = null;
    $count = 0;


    $dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
    or die("Couldn't connect to database.");

    $db = mysql_select_db("technopedia2", $dbh)
    or die("Couldn't select database.");

    $readColNames = "SHOW COLUMNS FROM ".$tableName;
    $result = mysql_query($readColNames);


    while($row = mysql_fetch_array($result)){
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


    mysql_close($dbh);
}


function checkValidLogin($username, $password){
    $tableName = "Staff";
    $sql = "Select * From ".$tableName." Where "."`Username` = '".$username."' and `StaffPassword` = '".$password."'";
    $result = mysql_query($sql);
   if (mysql_numrows($result) == 0){ // if the login is invalid
               include "login2.html";
                echo '
                    <script type="text/javascript">
                    document.getElementById("msgBox").style.visibility = "visible";
                    </script>';
    }
    else { //if the login is valid
        while ($row = mysql_fetch_array($result)) {
            $username = $row['Username'];
            $type = $row['Type'];

            switch($type){
                case 'Admin':{ //if user is admin
                    /**/
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



