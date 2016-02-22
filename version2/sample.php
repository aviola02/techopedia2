<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2/22/2016
 * Time: 3:04 PM
 */

<<<<<<< HEAD
$sdaf = random_int(1,10);
echo $sdaf;
=======
$username = $_POST['Username'];
$password = $_POST['Password'];
include 'dbManipulation.php';

checkValidLogin($username, $password);
>>>>>>> 42e34c2161dfc07b3fe3f5d78889307dc2cadacd
