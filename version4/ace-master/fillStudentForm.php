<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/2/2016
 * Time: 7:38 PM
 */
$id= $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From Student Where IdentityNo = ".$id;
$result = mysql_query($sql);
$r = array();
while ($row = mysql_fetch_assoc($result)){
   $r[]=$row;
}
echo json_encode($r);


mysql_close($sql);
=======
<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 3/2/2016
 * Time: 7:38 PM
 */
$id= $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select * From Student Where IdentityNo = ".$id;
$result = mysql_query($sql);
$r = array();
while ($row = mysql_fetch_assoc($result)){
   $r[]=$row;
}
echo json_encode($r);


mysql_close($sql);
>>>>>>> 16ac76dc582df28e5c4358223e3a7e3f07968021
