<?php

if ($_SESSION["Type"]!="Secretary"){
    header("Location: login2.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Secretary</title>

    <meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/ui.jqgrid.min.css" />

    <!-- page specific plugin styles for Add Students in Class form-->
    <link rel="stylesheet" href="assets/css/bootstrap-duallistbox.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-multiselect.min.css" />
    <link rel="stylesheet" href="assets/css/select2.min.css" />

    <!-- specific plugin styles for Calendar -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css" />

    <!--    CSS for modals style-->
    <link rel="stylesheet" href="assets/css/modals.css"/>
    <!-- text fonts -->
    <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body onload='setTitle("label", "formName"); setTitle("label","editFormName"); setTitle("staffLabel","staffFormName"); setTitle("staffLabel","staffEditFormName")' class="no-skin">
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="http://www.technopedia.eu/" class="navbar-brand">
                <small>
                    <img src="assets/images/head.png" height="100%">
                    Technopedia
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome</small>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li>
                            <a href="#" onclick='setStaffEditButton("profile")'>
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="login2.html">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>


        <ul class="nav nav-list">
            <li class="">
                <a id = "showStudents" href="#" onclick=showStudents("Student")>
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> Students </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a id = "showClass" href="#" onclick=showClass("Class")>
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> Classes </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a onclick=showStaff("Staff") href="#">
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> Staff </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a onclick="createTimetable()" href="#">
                    <i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Timetable
							</span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa 	fa-pencil-square-o"></i>
                    <span class="menu-text"> Students In Classes </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a onclick="formViewer('StudInClass')" href="#">
                            <i class="menu-icon glyphicon glyphicon-plus "></i>
	                            Add Students
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a onclick="formViewer('delStudInClass')" href="#">
                            <i class="menu-icon glyphicon glyphicon-minus "></i>
                            Remove Students
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>


        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Tables</a>
                    </li>
                    <li class="active">jqGrid plugin</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">


                <div class="page-header">
                    <h1>
                        Secretary
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
<!--                            Student's basic info.-->
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <table id="grid-table"></table>

                        <div id="grid-pager"></div>
                        <script type="text/javascript">
                            //var $path_base = ".";//in Ace demo this will be used for editurl parameter
                        </script>
                        <hr>

                        <table id="class-table"></table>

                        <div id="class-pager"></div>
                        <script type="text/javascript">
                            //var $path_base = ".";//in Ace demo this will be used for editurl parameter
                        </script>
                        <hr>

                        <table id="staff-table"></table>

                        <div id="staff-pager"></div>
                        <script type="text/javascript">
                            //var $path_base = ".";//in Ace demo this will be used for editurl parameter
                        </script>
                        <hr>



                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div id="timetable" class="row">

                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <hr>
                        <iframe style="display: none" name="stcl" ></iframe>
                        <div class="row">
                            <div class="col-xs-12">

                                <!-- PAGE CONTENT BEGINS -->
                                <form style="display: none" id="StudInClass" method="post" target="stcl" class="form-horizontal" role="form">

                                    <div class="space-6"></div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="food">Choose Class</label>

                                        <div class="col-xs-12 col-sm-9">
                                            <select id="food" class="multiselect" multiple="">
                                                <?php
                                                /**
                                                 * Created by PhpStorm.
                                                 * User: hamdy
                                                 * Date: 2/28/16
                                                 * Time: 7:29 PM
                                                 */

                                                $dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
                                                or die("Couldn't connect to database.");

                                                $db = mysql_select_db("technopedia2", $dbh)
                                                or die("Couldn't select database.");

                                                $sql = "Select CourseName, ClassNo, Year From Class";
                                                $result = mysql_query($sql);
                                                while($row = mysql_fetch_array($result)){
                                                    $str = $row['CourseName'].'-'.$row['ClassNo'].'-'.$row['Year'];
                                                    $str2 = "\"".$str."\"";
                                                    $str2 = htmlspecialchars($str2, ENT_QUOTES);
                                                    echo '<option onclick=setTheClass('.$str2.') value='.$str2.'>'.$str.'</option>';

                                                }

                                                mysql_close($dbh);

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-top" for="duallist"> Dual listbox </label>

                                        <div class="col-sm-8">
                                            <select multiple="multiple" size="10" name="duallistbox_demo1[]" id="duallist">

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

                                                $sql = "Select CandidateID, FirstNameEnglish, LastNameEnglish From Student";
                                                $result = mysql_query($sql);
                                                while($row = mysql_fetch_array($result)){
                                                    $str = $row['CandidateID'];
                                                    $str2 = "\"".$str."\"";
                                                    $str2 = htmlspecialchars($str2, ENT_QUOTES);
                                                    echo '<option value='.$str2.'>'.$row['CandidateID'].'-'.$row['FirstNameEnglish'].'-'.$row['LastNameEnglish'].'</option>';

                                                }

                                                mysql_close($dbh);

                                                ?>
                                            </select>

                                            <div class="hr hr-16 hr-dotted"></div>

                                        </div>
                                    </div>
                                    <button class="btn btn-info" onclick="formViewerSubmitButton()">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Submit
                                    </button>
                                </form>


                                <!-- PAGE CONTENT BEGINS -->
                                <form style="display: none" id="delStudInClass" method="post" action="deleteStudentFromClass.php" target="stcl" class="form-horizontal" role="form">

                                    <div class="space-6"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course Name: </label>

                                        <div class="col-sm-9">
                                            <input required type="text" name="field0" placeholder="The course name that you want to delete the student from..." class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Class No: </label>

                                        <div class="col-sm-9">
                                            <input required type="text" name="field1" placeholder="The student's class number..." class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Year: </label>

                                        <div class="col-sm-9">
                                            <input required type="text" name="field2" placeholder="The year which the student was in the class..." class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Candidate ID: </label>

                                        <div class="col-sm-9">
                                            <input required type="text" name="field3" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <button class="btn btn-info" onclick="">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Submit
                                    </button>
                                </form>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
						<span class="bigger-120">
							<span class="black bolder">Technopedia</span>
						</span>

                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- The ADD Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">Add a Student</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe name="dammy" onchange="addSubmitButton()" style="display: none"></iframe>
                <form id="addForm" method="post" target="dammy" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Candidate ID: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" id="formName" name="formName"  class="col-xs-10 col-sm-5" />
                            <input required type="text" name="field0" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name in Greek: </label>

                        <div class="col-sm-9">
                            <input required type="text"  name="field1" placeholder="First Name in Greek..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name in Greek: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field2" placeholder="Last Name in Greek..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field3" placeholder="First Name in English..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field4" placeholder="Last Name in English..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Identity Number: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field5" placeholder="ID..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Identity Type: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field6" placeholder="ID Type..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ECDL LogBook Number: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field7" placeholder="ECDL LogBook Number..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                        <div class="col-sm-9">
                            <input type="text" style="display: none" name="field8" id="field8" class="col-xs-10 col-sm-5" value="2000-01-01" />

                            <select onchange='getDate("Day","Month","Year","field8")' class="chosen-select form-control" id="Day" data-placeholder="Choose a Day...">
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <br>
                            <select onchange='getDate("Day","Month","Year","field8")' class="chosen-select form-control" id="Month" data-placeholder="Choose a Day...">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <br>
                            <input onchange='getDate("Day","Month","Year","field8")' type="text" id="Year" value="2000" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Address: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field9" placeholder="Address..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Second Address: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field10" placeholder="Second Address if exists..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> City: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field11" placeholder="City..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Town or Village: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field12" placeholder="Town or Village" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ZIP Code: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field13" placeholder="ZIP Code..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Home Phone: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field14" placeholder="Home Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field15" placeholder="Mobile Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Work Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field16" placeholder="Work Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail: </label>

                        <div class="col-sm-9">
                            <input type="email" pattern="[^ @]*@[^ @]*" name="field17" placeholder="E-mail..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Test Center: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field18" placeholder="Test Center..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Registration Level: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field19" placeholder="Registration Level..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Name: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field20" placeholder="Father Name..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Job: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field21" placeholder="Father Job..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field22" placeholder="Father Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Name: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field23" placeholder="Mother Name..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Job: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field24" placeholder="Mother Job..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field25" placeholder="Mother Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Document: </label>

                        <div class="col-sm-9">
                            <input type="file" name="field26" placeholder="Add a Document..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" onclick="addSubmitButton()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>

</div>
<!--Edit modal-->
<div  id="myEditModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">Edit the Student</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe style="display: none" name="dammy_edit" ></iframe>
                <form id="editForm" method="post" target="dammy_edit" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Candidate ID: </label>

                        <div class="col-sm-9">
                            <input style="display: none"  type="text" id="editFormName" name="editFormName"  class="col-xs-10 col-sm-5" />
                            <input required readonly="" type="text" id="edit_field0" name="edit_field0" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name in Greek: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field1"  name="edit_field1" placeholder="First Name in Greek..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name in Greek: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field2" name="edit_field2" placeholder="Last Name in Greek..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field3" id="edit_field3" name="edit_field3" placeholder="First Name in English..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field4" name="edit_field4" placeholder="Last Name in English..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Identity Number: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field5" name="edit_field5" placeholder="ID..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Identity Type: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field6" name="edit_field6" placeholder="ID Type..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ECDL LogBook Number: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field7" name="edit_field7" placeholder="ECDL LogBook Number..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                        <div class="col-sm-9">
                            <input type="text" style="display: none" id="edit_field8" name="edit_field8" id="field8" class="col-xs-10 col-sm-5" />

                            <select onchange="getDateForEdit()" class="chosen-select form-control" id="editDay" data-placeholder="Choose a Day...">
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <br>
                            <select onchange="getDateForEdit()" class="chosen-select form-control" id="editMonth" data-placeholder="Choose a Day...">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <br>
                            <input onchange="getDateForEdit()" type="text" id="editYear" value="2000" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Address: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field9" name="edit_field9" placeholder="Address..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Second Address: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field10" name="edit_field10" placeholder="Second Address if exists..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> City: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field11" name="edit_field11" placeholder="City..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Town or Village: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field12" name="edit_field12" placeholder="Town or Village" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ZIP Code: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field13" name="edit_field13" placeholder="ZIP Code..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Home Phone: </label>

                        <div class="col-sm-9">
                            <input required type="text" id="edit_field14" name="edit_field14" placeholder="Home Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field15" name="edit_field15" placeholder="Mobile Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Work Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field16" name="edit_field16" placeholder="Work Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail: </label>

                        <div class="col-sm-9">
                            <input type="email" pattern="[^ @]*@[^ @]*" id="edit_field17" name="edit_field17" placeholder="E-mail..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Test Center: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field18" name="edit_field18" placeholder="Test Center..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Registration Level: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field19" name="edit_field19" placeholder="Registration Level..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Name: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field20" name="edit_field20" placeholder="Father Name..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Job: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field21" name="edit_field21" placeholder="Father Job..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field22" name="edit_field22" placeholder="Father Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Name: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field23" name="edit_field23" placeholder="Mother Name..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Job: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field24" name="edit_field24" placeholder="Mother Job..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mother Phone: </label>

                        <div class="col-sm-9">
                            <input type="text" id="edit_field25" name="edit_field25" placeholder="Mother Phone..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Document: </label>

                        <div class="col-sm-9">
                            <input type="file" id="edit_field26" name="edit_field26" placeholder="Add a Document..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" onclick="editSubmitButton()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>
    </div>
<!--View modal-->
<div  id="myViewModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">View Student</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div style="width: 100%" class="col-xs-12 col-sm-9">


                    <div class="space-12"></div>

                    <div id="studentView" class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> CandidateID</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field0"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> First Name Greek</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field1"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Last Name Greek</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field2"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> First Name English</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field3"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Last Name English</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field4"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Identity Number</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field5"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Identity Type</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field6"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> ECDL LogBook Number</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field7"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Date Of Birth</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field8"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Address 1</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field9"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Address 2</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field10"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> City</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field11"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Town Village</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field12"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Zip Code</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field13"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Home Phone</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field14"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Mobile Phone</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field15"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Work Phone</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field16"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Email</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field17"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Test Center</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field18"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Registration Level</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field19"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Father Name</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field20"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Father Job</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field21"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Father Phone</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field22"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Mother Name</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field23"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Mother Job</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field24"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Mother Phone</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field25"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Documents</div>

                            <div class="profile-info-value">
                                <span class="editable" id="view_field26"></span>
                            </div>
                        </div>


                    </div>

                    <div class="space-20"></div>
                <div class="space-6"></div>


                </div>
            </div>
        </div>

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>

    <div  id="addStaffModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <span class="close">×</span>

            <h4 id = "staffLabel" class="blue bigger">Add a Staff</h4>
            <div   class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <hr>
                    <iframe style="display: none" name="dammy2" ></iframe>
                    <form id="addStaffForm" method="post" target="dammy2" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>

                            <div class="col-sm-9">
                                <input  type="text" style="display: none" id="staffFormName" name="formName"  class="col-xs-10 col-sm-5" />
                                <input required type="text" name="field0" placeholder="Put Username..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff Password: </label>

                            <div class="col-sm-9">
                                <input readonly type="text" name="field1" placeholder="Put Staff Password..." value="12345678" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                            <div class="col-sm-9">
                                <input required type="text" name="field2" placeholder="Put Staff First Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                            <div class="col-sm-9">
                                <input required type="text" name="field3" placeholder="Put Staff Last Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input type="text" style="display: none" name="field4" id="addStaff_field4" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("StaffDay","StaffMonth","StaffYear","addStaff_field4")' class="chosen-select form-control" id="StaffDay" data-placeholder="Choose a Day...">
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <br>
                                <select onchange='getDate("StaffDay","StaffMonth","StaffYear","addStaff_field4")' class="chosen-select form-control" id="StaffMonth" data-placeholder="Choose a Day...">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <br>
                                <input onchange='getDate("StaffDay","StaffMonth","StaffYear","addStaff_field4")' type="text" id="StaffYear" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Phone: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field5" placeholder="Put Mobile Phone..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Academic Details: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field6" placeholder="Put Employee Academic Details..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Joining: </label>

                            <div class="col-sm-9">
                                <input type="text" style="display: none" name="field7" id="addStaff_field7" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("StaffDay2","StaffMonth2","StaffYear2","addStaff_field7")' class="chosen-select form-control" id="StaffDay2" data-placeholder="Choose a Day...">
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <br>
                                <select onchange='getDate("StaffDay2","StaffMonth2","StaffYear2","addStaff_field7")' class="chosen-select form-control" id="StaffMonth2" data-placeholder="Choose a Day...">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <br>
                                <input onchange='getDate("StaffDay2","StaffMonth2","StaffYear2","addStaff_field7")' type="text" id="StaffYear2" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Experience: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field8" placeholder="Put Experience..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Category: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field9" placeholder="Put Employee Category..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email: </label>

                            <div class="col-sm-9">
                                <input type="text" pattern="[^ @]*@[^ @]*" name="field10" placeholder="Put Email..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type: </label>

                            <div class="col-sm-9">
                                <input type="text" style="display: none" name="field11" id="addStaff_field11" value="Admin" class="col-xs-10 col-sm-5" />

                                <select onchange='selectBoxToTextBox("Type","addStaff_field11")' class="chosen-select form-control" id="Type" data-placeholder="Choose a Day...">
                                    <option value="01">Admin</option>
                                    <option value="02">Secretary</option>
                                    <option value="03">Teacher</option>
                                </select>

                            </div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Picture: </label>

                            <div class="col-sm-9">
                                <input type="file" name="field12" placeholder="Add Employee Picture..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" onclick="addStaffSubmitButton()">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- PAGE CONTENT ENDS -->

                </div><!-- /.col -->
            </div><!-- /.row -->


        </div>

    </div>

    <div  id="editStaffModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <span class="close">×</span>

            <h4 id = "staffLabel" class="blue bigger">Edit a Staff</h4>
            <div   class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <hr>
                    <iframe style="display: none" name="dammy2" ></iframe>
                    <form id="editStaffForm" method="post" target="dammy2" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>

                            <div class="col-sm-9">
                                <input style="display: none"  type="text" id="staffEditFormName" name="editFormName"  class="col-xs-10 col-sm-5" />
                                <input required type="text" name="edit_field0" id="edit_stafffield0" placeholder="Put Username..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff Password: </label>

                            <div class="col-sm-9">
                                <input readonly type="text" name="edit_field1" id="edit_stafffield1" placeholder="Put Staff Password..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                            <div class="col-sm-9">
                                <input required type="text" name="edit_field2" id="edit_stafffield2" placeholder="Put Staff First Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                            <div class="col-sm-9">
                                <input required type="text" name="edit_field3" id="edit_stafffield3" placeholder="Put Staff Last Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input style="display: none" type="text" name="edit_field4" id="edit_stafffield4" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("editStaffDay","editStaffMonth","editStaffYear","edit_stafffield4")' class="chosen-select form-control" id="editStaffDay" data-placeholder="Choose a Day...">
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <br>
                                <select onchange='getDate("editStaffDay","editStaffMonth","editStaffYear","edit_stafffield4")' class="chosen-select form-control" id="editStaffMonth" data-placeholder="Choose a Day...">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <br>
                                <input onchange='getDate("editStaffDay","editStaffMonth","editStaffYear","edit_stafffield4")' type="text" id="editStaffYear" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Phone: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field5" id="edit_stafffield5" placeholder="Put Mobile Phone..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Academic Details: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field6" id="edit_stafffield6" placeholder="Put Employee Academic Details..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Joining: </label>

                            <div class="col-sm-9">
                                <input style="display: none" type="text" name="edit_field7" id="edit_stafffield7" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("editStaffDay2","editStaffMonth2","editStaffYear2","edit_stafffield7")' class="chosen-select form-control" id="editStaffDay2" data-placeholder="Choose a Day...">
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <br>
                                <select onchange='getDate("editStaffDay2","editStaffMonth2","editStaffYear2","edit_stafffield7")' class="chosen-select form-control" id="editStaffMonth2" data-placeholder="Choose a Day...">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <br>
                                <input onchange='getDate("editStaffDay2","editStaffMonth2","editStaffYear2","edit_stafffield7")' type="text" id="editStaffYear2" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Experience: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field8" id="edit_stafffield8" placeholder="Put Experience..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Category: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field9" id="edit_stafffield9" placeholder="Put Employee Category..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email: </label>

                            <div class="col-sm-9">
                                <input pattern="[^ @]*@[^ @]*" type="text" name="edit_field10" id="edit_stafffield10" placeholder="Put Email..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type: </label>

                            <div class="col-sm-9">
                                <input style="display: none" type="text" name="edit_field11" id="edit_stafffield11" value="Admin" class="col-xs-10 col-sm-5" />

                                <select onchange='selectBoxToTextBox("editType","edit_stafffield11")' class="chosen-select form-control" id="editType" data-placeholder="Choose a Day...">
                                    <option value="01">Admin</option>
                                    <option value="02">Secretary</option>
                                    <option value="03">Teacher</option>
                                </select>

                            </div>


                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Picture: </label>

                            <div class="col-sm-9">
                                <input type="file" name="edit_field12" id="edit_stafffield12" placeholder="Add Employee Picture..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" onclick="editStaffSubmitButton()">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- PAGE CONTENT ENDS -->

                </div><!-- /.col -->
            </div><!-- /.row -->


        </div>

    </div>

    <div  id="myStaffViewModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <span class="close">×</span>

            <h4 id = "label" class="blue bigger">View Student</h4>
            <div   class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div style="width: 100%" class="col-xs-12 col-sm-9">


                        <div class="space-12"></div>

                        <div id="studentView" class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Username</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field0"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Password</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field1"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> First Name</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field2"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Last Name</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field3"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Date of Birth</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field4"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Mobile Phone</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field5"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Academic Details</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field6"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Date of Joining</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field7"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Experience</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field8"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Category</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field9"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Email</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field10"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Type</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field11"></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Picture</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="viewStaff_field12"></span>
                                </div>
                            </div>

                        </div>

                        <div class="space-20"></div>
                        <div class="space-6"></div>


                    </div>
                </div>
            </div>

        </div><!-- /.col -->
    </div><!-- /.row -->


</div>


<!-- The ADD Class Modal -->
<div id="addClass" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">Add a Class</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe name="dammy" style="display: none" onchange="addClassSubmitButton()" ></iframe>
                <form id="addClassForm" method="post" target="dammy" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course Name: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" id="formName" value="Class" name="formName"  class="col-xs-10 col-sm-5" />
                            <input required type="text" name="field0" placeholder="Name of the Course..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Class Number: </label>

                        <div class="col-sm-9">
                            <input required type="text"  name="field1" placeholder="Class Number..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Year: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field2" placeholder="Year of the seazon..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Room Number: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field3" placeholder="Room Number..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teacher UserName: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field4" placeholder="Teacher's UserName..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Days: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field5" placeholder="Initials of the days (M,T,W,Th,F,S,Su) sapperated by space" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Starting Time: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field6" placeholder="In this form 15:55" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ending Time: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field7" placeholder="In this form 15:55" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" onclick="addClassSubmitButton()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>

</div>
<!-- End Add Class Modal -->

<div id="editClass" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">Edit a Class</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe name="classdammy" style="display: none" ></iframe>
                <form id="editClassForm" method="post" target="classdammy" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course Name: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" id="editFormName" value="Class" name="editFormName"  class="col-xs-10 col-sm-5" />
                            <input required readonly="" type="text" name="edit_field0" id="edit_Classfield0" placeholder="Name of the Course..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Class Number: </label>

                        <div class="col-sm-9">
                            <input required  readonly="" type="text"  name="edit_field1" id = "edit_Classfield1" placeholder="Class Number..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Year: </label>

                        <div class="col-sm-9">
                            <input required type="text" readonly="" name="edit_field2" id = "edit_Classfield2" placeholder="Year of the seazon..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Room Number: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="edit_field3" id = "edit_Classfield3" placeholder="Room Number..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teacher UserName: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="edit_field4" id = "edit_Classfield4" placeholder="Teacher's UserName..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Days: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="edit_field5" id = "edit_Classfield5" placeholder="Initials of the days (M,T,W,Th,F,S,Su) sapperated by space" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Starting Time: </label>

                        <div class="col-sm-9">
                            <input type="text" name="edit_field6" id = "edit_Classfield6" placeholder="In this form 15:55" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ending Time: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="edit_field7" id = "edit_Classfield7" placeholder="In this form 15:55" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" onclick="editClassSubmitButton()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>

</div>
<!-- End Edit Class Modal -->

<div  id="myClassViewModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">View Class</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div style="width: 100%" class="col-xs-12 col-sm-9">


                    <div class="space-12"></div>

                    <div id="studentView" class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Course Name</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field0"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Class No</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field1"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Year</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field2"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Room No</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field3"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Teacher</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field4"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Days</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field5"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Starts At</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field6"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Ends At</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewClass_field7"></span>
                            </div>
                        </div>


                    </div>

                    <div class="space-20"></div>
                    <div class="space-6"></div>


                </div>
            </div>
        </div>

    </div><!-- /.col -->
</div><!-- /.row -->


</div>


    <!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery.2.1.1.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/fuelux.wizard.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/jquery.maskedinput.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/jquery.jqGrid.min.js"></script>
<script src="assets/js/grid.locale-en.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="assets/js/ourScripts.js"></script>
<script src="assets/js/StaffViewer.js"></script>
<script src="assets/js/ClassViewer.js"></script>

<script src="assets/js/date.js"></script>

<!-- page specific plugin scripts for Timetable -->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/fullcalendar.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/TimetableViewer.js"></script>


<!-- page specific plugin scripts for Add Students in Class -->
<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
<script src="assets/js/jquery.raty.min.js"></script>
<script src="assets/js/bootstrap-multiselect.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/typeahead.jquery.min.js"></script>


<!-- inline scripts related to this page -->
<script src="assets/js/StudentInClassViewer.js"></script>


</body>
</html>

