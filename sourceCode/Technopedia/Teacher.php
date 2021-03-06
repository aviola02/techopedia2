<?php

/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/22/16
 * Time: 9:52 PM
 *
 * Στο αρχείο αυτό υλοποιούντε οι λειτουργίες διαχείρισης που αφορούν τον δάσκαλο.
 * Ο Δάσκαλος θα μπορεί να ανατρέχει και να διαχειρίζεται τα μαθήματα που κάνει.
 * Τα μαθήματα παρουσιάζονται σε πίνακα ο οποίος επιτρέπει πρόσθεση, διαγραφή,
 * παρουσίαση και τροποποίηση της κάθε εγγραφής. Οι πίνακες περιέχουν το κάθε
 * μάθημα της τάξης που επιλέχθικε. Επίσης, ο δάσκαλος μπορεί να ανατρέχει στο
 * ημερολόγιο για να δεί το πρόγραμμα του φροντιστηρίου με τις εξετάσεις και τα
 * διάφορα events. Παρουσιάζονται σε ημερολόγιο με δυνατότητα πρόσθεσης, διαγραφής,
 * παρουσίασης και τροποποίησης της κάθε εγγραφής. Τέλος, μπορεί να δεί και να
 * κάνει διάφορα είδη αναζητήσεων όσο αφορά τις παρουσίες των μαθητών. Αναζητησεις
 * μπορεί να κάνει βάζοντας όσα φίλτρα θέλει πάνω στον πίνακα με τις παρουσίες και
 * απουσίες των μαθητών.
 *
 */

    if ($_SESSION["Type"]!="Teacher"){
        header("Location: login2.html");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Teacher</title>

    <meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/ui.jqgrid.min.css" />

    <!-- specific plugin styles for Calendar -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css" />

    <!-- modal css -->
    <link rel="stylesheet" href="assets/css/modals.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/style.min.css" class="ace-main-stylesheet" id="main-ace-style" />

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

<body id="body" class="no-skin">
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
                    <a style="border-radius: 4px;" data-toggle="dropdown" href="#" class="dropdown-toggle">
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
                            <a href="#" onclick='setStaffEditButton("password")'>
                                <i class="ace-icon fa fa-user"></i>
                                Change Password
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
<!-- embedded php code in order to display the dynamic part of the Navigation Menu -->
            <?php
            // embedded php code in order to display the dynamic part of the Navigation Menu
            include 'ClassNav.php';

            ?>

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
                        <a>Technopedia</a>
                    </li>
                    <li>
                        <a>Teacher</a>
                    </li>

                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">


                <div class="page-header">
                    <h1>
                        Teacher
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <table id="schedule-table"></table>
                        <div id="schedule-pager"></div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div id="timetable" class="row">

                        </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <br>
                <table id="attend-table"></table>
                <div id="attend-pager"></div>


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
</div><!-- /.main-container -->


<!--They follow all the Modals about every feature that the Teacher profile provides-->

<div id="profileModal" class="modal">
    <!-- Modal content -->
        <div class="modal-content">

            <h4 class="blue bigger"><label>Hello</label><span> </span><label id = "profileUsername"> <?php echo $_SESSION['username'];?></label><label id = "profileLabel">! Edit your Profile</label></h4>

            <div   class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <hr>
                    <iframe style="display: none" name="dammy2" ></iframe>
                    <form id="editProfileForm" method="post" target="dammy2" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>

                            <div class="col-sm-9">
                                <input style="display: none"  type="text" id="profileEditFormName" value="Profile" name="editFormName"  class="col-xs-10 col-sm-5" />
                                <input readonly type="text" name="edit_field0" id="edit_Profilefield0" placeholder="Put Username..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div style="display: none" class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff Password: </label>

                            <div class="col-sm-9">
                                <input type="password" name="edit_field1" id="edit_Profilefield1" placeholder="Put Staff Password..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                            <div class="col-sm-9">
                                <input readonly required type="text" name="edit_field2" id="edit_Profilefield2" placeholder="Put Staff First Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                            <div class="col-sm-9">
                                <input readonly required type="text" name="edit_field3" id="edit_Profilefield3" placeholder="Put Profile Last Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input style="display: none" type="text" name="edit_field4" id="edit_Profilefield4" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select readonly disabled onchange='getDate("editProfileDay","editProfileMonth","editProfileYear","edit_Profilefield4")' class="chosen-select form-control" id="editProfileDay" data-placeholder="Choose a Day...">
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
                                <select readonly disabled onchange='getDate("editProfileDay","editProfileMonth","editProfileYear","edit_Profilefield4")' class="chosen-select form-control" id="editProfileMonth" data-placeholder="Choose a Day...">
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
                                <input readonly onchange='getDate("editProfileDay","editProfileMonth","editProfileYear","edit_Profilefield4")' type="text" id="editProfileYear" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile Phone: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field5" id="edit_Profilefield5" placeholder="Put Mobile Phone..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Academic Details: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field6" id="edit_Profilefield6" placeholder="Put Employee Academic Details..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Joining: </label>

                            <div class="col-sm-9">
                                <input style="display: none" type="text" name="edit_field7" id="edit_Profilefield7" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select readonly disabled onchange='getDate("editProfileDay2","editProfileMonth2","editProfileYear2","edit_Profilefield7")' class="chosen-select form-control" id="editProfileDay2" data-placeholder="Choose a Day...">
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
                                <select readonly disabled onchange='getDate("editProfileDay2","editProfileMonth2","editProfileYear2","edit_Profilefield7")' class="chosen-select form-control" id="editProfileMonth2" data-placeholder="Choose a Day...">
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
                                <input readonly onchange='getDate("editProfileDay2","editProfileMonth2","editProfileYear2","edit_Profilefield7")' type="text" id="editProfileYear2" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Experience: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field8" id="edit_Profilefield8" placeholder="Put Experience..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Category: </label>

                            <div class="col-sm-9">
                                <input readonly type="text" name="edit_field9" id="edit_Profilefield9" placeholder="Put Employee Category..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email: </label>

                            <div class="col-sm-9">
                                <input pattern="[^ @]*@[^ @]*" type="text" name="edit_field10" id="edit_Profilefield10" placeholder="Put Email..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label readonly class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type: </label>

                            <div class="col-sm-9">
                                <input style="display: none" type="text" name="edit_field11" id="edit_Profilefield11" value="Teacher" class="col-xs-10 col-sm-5" />

                                <select readonly disabled onchange='selectBoxToTextBox("editProfileType","edit_Profilefield11")' class="chosen-select form-control" id="editProfileType" data-placeholder="Choose a Day...">
                                    <option value="01">Admin</option>
                                    <option value="02">Secretary</option>
                                    <option value="03">Teacher</option>
                                </select>

                            </div>


                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Picture: </label>

                            <div class="col-sm-9">
                                <input type="file" name="edit_field12" id="edit_Profilefield12" placeholder="Add Employee Picture..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" onclick="editStaffSubmitButton2()">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Submit
                                </button>

                            </div>
                        </div>
                    </form>
                    <!-- PAGE CONTENT ENDS -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>

</div>

<div  id="addScheduleModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "staffLabel" class="blue bigger">Add a Schedule</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe style="display: none" name="dammy3" ></iframe>
                <form id="addScheduleForm" method="post" target="dammy3" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course Name: </label>

                        <div class="col-sm-9">
                            <input  type="text" style="display: none" id="scheduleFormName" name="formName" value="Tschedule"  class="col-xs-10 col-sm-5" />
                            <input readonly type="text" name="field0" id="addSchedule_field0"  class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Class No: </label>

                        <div class="col-sm-9">
                            <input readonly type="text" name="field1" id="addSchedule_field1" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Year: </label>

                        <div class="col-sm-9">
                            <input readonly type="text" name="field2" id="addSchedule_field2" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Code: </label>

                        <div class="col-sm-9">
                            <input required type="text" name="field3" placeholder="Put The Program Code..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Topic: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field4" placeholder="Put The Topic..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exercises: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field5" placeholder="Put Exercises..." class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Notes: </label>

                        <div class="col-sm-9">
                            <input type="text" name="field6" placeholder="Put Notes..." class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" name="field7" id="addSchedule_field7" value="2000-01-01" class="col-xs-10 col-sm-5" />
                            <select onchange='getDate("ScheduleDay","ScheduleMonth","ScheduleYear","addSchedule_field7")' class="chosen-select form-control" id="ScheduleDay" data-placeholder="Choose a Day...">
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
                            <select onchange='getDate("ScheduleDay","ScheduleMonth","ScheduleYear","addSchedule_field7")' class="chosen-select form-control" id="ScheduleMonth" data-placeholder="Choose a Day...">
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
                            <input onchange='getDate("ScheduleDay","ScheduleMonth","ScheduleYear","addSchedule_field7")' type="text" id="ScheduleYear" value="2000" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Document/Picture: </label>

                        <div class="col-sm-9">
                            <input type="file" name="field8" placeholder="Add Document/Picture..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" onclick="addScheduleSubmitButton()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>

</div>

<div  id="editScheduleModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "staffLabel" class="blue bigger">Edit the Schedule</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe style="display: none" name="dammy4" ></iframe>
                <form id="editScheduleForm" method="post" target="dammy4" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course Name: </label>

                        <div class="col-sm-9">
                            <input  type="text" style="display: none" id="scheduleFormName" name="editFormName" value="Tschedule"  class="col-xs-10 col-sm-5" />
                            <input readonly type="text" name="edit_field0" id="editSchedule_field0"  class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Class No: </label>

                        <div class="col-sm-9">
                            <input readonly type="text" name="edit_field1" id="editSchedule_field1" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Year: </label>

                        <div class="col-sm-9">
                            <input readonly type="text" name="edit_field2" id="editSchedule_field2" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Program Code: </label>

                        <div class="col-sm-9">
                            <input readonly type="text" name="edit_field3" id="editSchedule_field3" placeholder="Put The Program Code..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Topic: </label>

                        <div class="col-sm-9">
                            <input type="text" name="edit_field4" id="editSchedule_field4" placeholder="Put The Topic..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exercises: </label>

                        <div class="col-sm-9">
                            <input type="text" name="edit_field5" id="editSchedule_field5" placeholder="Put Exercises..." class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Notes: </label>

                        <div class="col-sm-9">
                            <input type="text" name="edit_field6" id="editSchedule_field6" placeholder="Put Notes..." class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" name="edit_field7" id="editSchedule_field7" value="2000-01-01" class="col-xs-10 col-sm-5" />
                            <select onchange='getDate("editScheduleDay","editScheduleMonth","editScheduleYear","editSchedule_field7")' class="chosen-select form-control" id="editScheduleDay" data-placeholder="Choose a Day...">
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
                            <select onchange='getDate("editScheduleDay","editScheduleMonth","editScheduleYear","editSchedule_field7")' class="chosen-select form-control" id="editScheduleMonth" data-placeholder="Choose a Day...">
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
                            <input onchange='getDate("editScheduleDay","editScheduleMonth","editScheduleYear","editSchedule_field7")' type="text" id="editScheduleYear" value="2000" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Document/Picture: </label>

                        <div class="col-sm-9">
                            <input type="file" name="edit_field8" id="editSchedule_field8" placeholder="Add Document/Picture..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" onclick="editScheduleSubmitButton()">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->


    </div>

</div>

<div  id="viewScheduleModal" class="modal">

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
                                <span class="editable" id="viewSchedule_field0"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Class No</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field1"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Year</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field2"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Program Code</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field3"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Topic</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field4"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Exercises</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field5"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Notes</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field6"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Date</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field7"></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Document/Picture</div>

                            <div class="profile-info-value">
                                <span class="editable" id="viewSchedule_field8"></span>
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

<div id="passwordModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">

        <h4 class="blue bigger"><label>Hello</label><span> </span><label id = "passwordUsername"> <?php echo $_SESSION['username'];?></label><label id = "profileLabel">! Change your Password</label></h4>

        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe style="display: none" name="dammy22" ></iframe>
                <form id="passwordForm" method="post" action="changePassword.php" target="dammy22" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>
                        <div class="col-sm-9">
                            <input readonly type="text" name="userName"  id="userName" placeholder="Put Current Password..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password: </label>
                        <div class="col-sm-9">
                            <input type="password" name="edit_PasswordField0"  id="edit_PasswordField0" placeholder="Put Current Password..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> New Password: </label>

                        <div class="col-sm-9">
                            <input type="password" name="edit_PasswordField1" id="edit_PasswordField1" placeholder="Put New Password..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                        </div>
                    </div>
                </form>
                <!-- PAGE CONTENT ENDS -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

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
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/jquery.jqGrid.min.js"></script>
    <script src="assets/js/grid.locale-en.js"></script>

    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
<!--<script src="assets/js/ourScripts.js"></script>-->
    <script src="assets/js/ScheduleViewer.js"></script>



    <!-- page specific plugin scripts -->
    <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>

    <script src="assets/js/TimetableViewer.js"></script>
    <script src="assets/js/date.js"></script>

    <script src="assets/js/StaffViewer.js"></script>

    <script src="assets/js/AttendancesViewer.js"></script>

    <script type="text/javascript">
        var editProfileModal = document.getElementById('profileModal');
        var addScheduleModal = document.getElementById('addScheduleModal');
        var editScheduleModal = document.getElementById('editScheduleModal');
        var viewScheduleModal = document.getElementById('viewScheduleModal');
        var editPasswordModal = document.getElementById('passwordModal');

        window.onclick = function (event) {
            if (event.target == editProfileModal || event.target == addScheduleModal || event.target == editScheduleModal || event.target == viewScheduleModal || event.target == editPasswordModal) {
                $('#profileModal,#addScheduleModal,#editScheduleModal, #viewScheduleModal, #passwordModal').css('display', 'none');
            }
        }
        </script>

</body>
</html>
