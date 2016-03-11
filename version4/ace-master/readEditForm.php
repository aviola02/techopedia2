<?php

$str = "edit_field";
$count = 0;
$table = null;

/**
 * Creates table that includes all form's data.
 */
$tableName = $_POST['editFormName'];
echo 'the table name is : ' . $tableName . '<br>';
while (isset($_POST[$str . $count])) { // checks if POST exists
    $table[$count] = $_POST[$str . $count];
    $count++;
}
foreach ($table as $value) {
    echo $value . '<br>';
}
include 'dbManipulation.php';

edit($table, $tableName);