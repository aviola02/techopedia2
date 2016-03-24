<?php

$str = "edit_field";
$count = 0;
$table = null;

/**
 * Creates table that includes all form's data.
 */
$tableName = $_POST['editFormName'];
while (isset($_POST[$str . $count])) { // checks if POST exists
    $table[$count] = $_POST[$str . $count];
    $count++;
}

include 'dbManipulation.php';

edit($table, $tableName);