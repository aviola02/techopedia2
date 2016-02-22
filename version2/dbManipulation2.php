<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/14/16
 * Time: 4:25 PM
 */


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