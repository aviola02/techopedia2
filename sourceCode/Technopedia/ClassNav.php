<?php
/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/28/16
 * Time: 7:29 PM
 *
 * * Here is the implementation of the dynamic part of the Navigation
 * Menu that is used by the Teacher and the Administrator. Particularly
 * is the part of the Navigation menu about the Classes and the Schedules
 * of every Class.
 *
 *
 */
include "dbAccess.php";

if ($_SESSION["Type"]=="Admin"){
    $sql = "Select * From Class Where `IsCurrentClass` = '1'";
}
else
    $sql = "Select * From Class Where `TeacherUsername` = '".$username."' And `IsCurrentClass` = '1'";
$result = mysqli_query($GLOBALS["dbh"],$sql);
if (mysqli_num_rows($result)==0){
    echo '<li class="">
        <a href="#" class="">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> Classes </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">';
} else {
    echo '<li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> Classes </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">';
}
while($row = mysqli_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo']."-".$row['Year'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li class="">
                <a href="#" onclick = showSchedule('.$str2.')><i class="menu-icon fa fa-caret-right"></i>'. $str.'</a>

                <b class="arrow"></b>
            </li>';

}


if ($_SESSION["Type"]=="Admin"){
    $sql = "Select * From Class Where `IsCurrentClass` = '0'";
}
else
    $sql = "Select * From Class Where "."`TeacherUsername` = '".$username."' And `IsCurrentClass` = '0'";
$result = mysqli_query($GLOBALS["dbh"],$sql);
if (mysqli_num_rows($result)==0) {
    echo '</ul>
    </li>
            <li class="">
        <a href="#" class="">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> Old Classes </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">';
}
else {
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
}
while($row = mysqli_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo']."-".$row['Year'];
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
                <a href="#" onclick = createTimetable()>
                    <i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Timetable

								
							</span>
                </a>

                <b class="arrow"></b>';

echo '</li><li class="">
                <a href="#" onclick = showAttendances("Attendances")>
                    <i class="menu-icon fa fa-check-square-o"></i>

							<span class="menu-text">
								Attendances


							</span>
                </a>

                <b class="arrow"></b></li>';


mysqli_close($GLOBALS["dbh"]);


?>