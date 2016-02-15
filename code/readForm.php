<html>
<body>

<?php

$str="field";
$count=0;
$table;
$tableName = "Student";



/**
 * Creates table that includes all form's data.
 */
$tableName = $_POST["formName"];
echo 'the table name is : '.$tableName.'<br>';
while(isset($_POST[$str.$count])){ // checks if POST exists
    $table[$count]=$_POST[$str.$count];
    $count++;
}
foreach($table as $value){
    echo $value.'<br>';
}
include 'dbManipulation.php';
insert($table, $tableName);

?>


</body>
</html>