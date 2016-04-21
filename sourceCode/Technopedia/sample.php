<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/22/2016
 * Time: 3:04 PM
 */

$username = $_POST['Username'];
$password = $_POST['Password'];
include 'dbManipulation.php';
include "dbAccess.php";

checkValidLogin($username, $password);