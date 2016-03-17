<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/16/16
 * Time: 4:59 PM
 */

$str = $_REQUEST["q"];

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");

$sql = "Select Number, Name, IdentityNo, ECDL_LogbookNo From " .$str;

$result = mysql_query($sql);