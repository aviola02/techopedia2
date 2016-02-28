<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/28/16
 * Time: 12:32 PM
 */

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");
echo '<li>
        <a href="#"><i class="fa fa-book fa-fw"></i> Classes<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">';


$sql = "Select * From Class Where "."`TeacherUsername` = '".$username."' And `Year` = '".date("Y")."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li><a href="#" onclick = showSchedule('.$str2.')>'. $str.'</a></li>';

}

echo '</ul>
            </li>
            <li>
        <a href="#"><i class="fa fa-book fa-fw"></i> Old Classes<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">';


$sql = "Select * From Class Where "."`TeacherUsername` = '".$username."' And `Year` != '".date("Y")."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo']."-".$row['Year'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li><a href="#" onclick = showSchedule('.$str2.')><i class="icon-angle-right"></i>'. $str.'</a></li>';
    /*<li><a href="form-general.html"><i class="icon-angle-right"></i> General</a></li>*/
}


echo '</ul>
      </li>';


mysql_close($dbh);


?>

<!--<li><a href="icon.html"><i class="icon-angle-right"></i> Icon & Button</a></li>-->
<!--<li><a href="progress.html"><i class="icon-angle-right"></i> Progress</a></li>-->