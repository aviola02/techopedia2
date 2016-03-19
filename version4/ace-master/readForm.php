<<<<<<< HEAD
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
   include 'dbManipulation.php';

        insert($table, $tableName);



=======
<html>
<body>

<?php

    $str = "field";
    $count = 0;
    $table = null;

    /**
     * Creates table that includes all form's data.
     */
    $tableName = $_POST['formName'];
    echo 'the table name is : ' . $tableName . '<br>';
    while (isset($_POST[$str . $count])) { // checks if POST exists
        $table[$count] = $_POST[$str . $count];
        $count++;
    }
    foreach ($table as $value) {
        echo $value . '<br>';
    }
    include 'dbManipulation.php';

        insert($table, $tableName);

?>


</body>
</html>
>>>>>>> 16ac76dc582df28e5c4358223e3a7e3f07968021
