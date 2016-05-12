<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 4/6/2016
 * Time: 4:05 PM
 *
 * This file contains the credentials of the Data Base that the
 * System is going to use. The credentials must be put correctly
 * and then a connection to the hosting server is made with the
 * selection of the Data Base that is given here. This file, must
 * be included in every file that needs connection to the Data Base.
 * The connection is created once here and is used from every here
 * every time that is needed by including the file.
 *
 */

$GLOBALS["link"]="localhost";
$GLOBALS["DB"]="root";
$GLOBALS["DBpass"]="";
$GLOBALS["DBName"]="technopedia2";

$GLOBALS["dbh"]= mysqli_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"],$GLOBALS["DBName"])
or die("Couldn't connect to database.");
