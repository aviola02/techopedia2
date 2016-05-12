<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/23/2016
 * Time: 5:17 PM
 *
 * This file is responsible to change the password if needed,
 * after validation.
 *
 */

include "dbAccess.php";
$username = $_POST["userName"];
$oldPassword = $_POST["edit_PasswordField0"];
$newPassword = $_POST["edit_PasswordField1"];

$sql = "Select StaffPassword From staff WHERE Username = '".$username."'";

$result = mysqli_query($GLOBALS["dbh"],$sql);
$row = mysqli_fetch_array($result);
if ($row['StaffPassword'] == md5($oldPassword)){
    $sql = "UPDATE staff SET  StaffPassword = '".md5($newPassword)."' WHERE Username = '".$username."'";
    mysqli_query($GLOBALS["dbh"],$sql);
    echo "<script type='text/javascript'> alert('You have successfully changed your password!'); </script>";

}
else{
    echo "<script type='text/javascript'> alert('Wrong Password!!'); </script>";
}

mysqli_close($GLOBALS["dbh"]);