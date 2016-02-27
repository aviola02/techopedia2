<!--
  Created by PhpStorm.
  User: hamdy
  Date: 2/22/16
  Time: 8:55 PM
-->



<?php
//include 'pullData2.php';

//$data = getData("Class");

$dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
or die("Couldn't connect to database.");

$db = mysql_select_db("technopedia2", $dbh)
or die("Couldn't select database.");
echo '<li class="accordion-group ">
        <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
            <i class="icon-book icon-large"></i> Classes <span class="label label-inverse pull-right"></span>
              </a>

              <ul class="collapse " id="component-nav">';


$sql = "Select * From Class Where "."`TeacherUsername` = '".$username."' And `Year` = '".date("Y")."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li><a href="#" onclick = showSchedule('.$str2.')><i class="icon-angle-right"></i>'. $str.'</a></li>';

}

echo '</ul>
            </li>
            <li class="accordion-group ">
                <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                    <i class="icon-book icon-large"></i> Old Classes </a>

                <ul class="collapse " id="form-nav">';


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
