<?php

    $str = "field";
    $count = 0;
    $table = null;

    /**
     * Creates table that includes all form's data.
     */
    $tableName = $_POST['formName'];
    while (isset($_POST[$str . $count])) { // checks if POST exists
        $table[$count] = $_POST[$str . $count];
        $count++;
    }

    if($tableName=="Staff"){
        $table[1]=md5($table[1]);
    }
   include 'dbManipulation.php';

        insert($table, $tableName);



