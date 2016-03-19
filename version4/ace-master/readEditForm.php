<<<<<<< HEAD
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

=======
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

>>>>>>> 16ac76dc582df28e5c4358223e3a7e3f07968021
edit($table, $tableName);