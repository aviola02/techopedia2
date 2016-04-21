<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/28/16
 * Time: 7:29 PM
 */

//include 'pullData2.php';

//$data = getData("Class");

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");
echo '<li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> Classes </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">';


$sql = "Select * From Class Where "."`TeacherUsername` = '".$username."' And `Year` = '".date("Y")."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li class="">
                <a href="#" onclick = showSchedule('.$str2.')><i class="menu-icon fa fa-caret-right"></i>'. $str.'</a>

                <b class="arrow"></b>
            </li>';

}

echo '</ul>
    </li>
            <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> Old Classes </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">';



$sql = "Select * From Class Where "."`TeacherUsername` = '".$username."' And `Year` != '".date("Y")."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo']."-".$row['Year'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li class="">
                <a href="#" onclick = showSchedule('.$str2.')><i class="menu-icon fa fa-caret-right"></i>'. $str.'</a>

                <b class="arrow"></b>
            </li>';
    /*<li><a href="form-general.html"><i class="icon-angle-right"></i> General</a></li>*/
}

echo '</ul>
    </li>
            <li class="">
                <a href="#" onclick = createTimetable()>
                    <i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Timetable

								
							</span>
                </a>

                <b class="arrow"></b>';

echo '</li>';


mysql_close($dbh);


?>