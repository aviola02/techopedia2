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

$sql = "Select * From Class Where "."`TeacherUsername` = '".$username."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    $str = $row['CourseName']."-".$row['ClassNo'];
    $str2 = "\"".$str."\"";
    $str2 = htmlspecialchars($str2, ENT_QUOTES);
    echo '<li><a onclick = showSchedule('.$str2.')><i class="icon-angle-right"></i>'. $str.'</a></li>';

}

mysql_close($dbh);


?>

<!--<li><a href="icon.html"><i class="icon-angle-right"></i> Icon & Button</a></li>-->
<!--<li><a href="progress.html"><i class="icon-angle-right"></i> Progress</a></li>-->
