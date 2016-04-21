
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

<body onload='formViewer("StudInClass");setTitle("label", "formName"); setTitle("label","editFormName"); setTitle("staffLabel","staffFormName"); setTitle("staffLabel","staffEditFormName")' class="no-skin">
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
                        <a onclick="formViewer('StudInClass','delStudInClass')" href="#">
                            <i class="menu-icon glyphicon glyphicon-plus "></i>
                            Add Students
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="addStudents.php">
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


                        <iframe style="display: none" name="stcl" ></iframe>
                        <div class="row">
                            <div class="col-xs-12">

                                <!-- PAGE CONTENT BEGINS -->
                                <form id="StudInClass" method="post" target="stcl" class="form-horizontal" role="form">

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

                                                include 'dbAccess.php';
                                                $dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
                                                or die("Couldn't connect to database.");

                                                $db = mysql_select_db($GLOBALS["DBName"], $dbh)
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

                                                include 'dbAccess.php';
                                                //$data = getData("Class");

                                                $dbh= mysql_connect($GLOBALS["link"],$GLOBALS["DB"],$GLOBALS["DBpass"])
                                                or die("Couldn't connect to database.");

                                                $db = mysql_select_db($GLOBALS["DBName"], $dbh)
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
                            </div><!-- /.col -->
                        </div>


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


    </div>

</div>

<div id="profileModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">

        <h4 class="blue bigger"><label>Hello</label><span> </span><label id = "profileUsername"> <?php echo $_SESSION['username'];?></label><label id = "profileLabel">! Edit your Profile</label></h4>

        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <iframe style="display: none"  name="dammy12" ></iframe>
                <form id="editProfileForm" method="post" target="dammy12" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>

                        <div class="col-sm-9">
                            <input style="display: none"  type="text" id="profileEditFormName" value="Staff" name="editFormName"  class="col-xs-10 col-sm-5" />
                            <input required type="text" name="edit_field0" id="edit_Profilefield0" placeholder="Put Username..." class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff Password: </label>

                        <div class="col-sm-9">
                            <input readonly type="password" name="edit_field1" id="edit_Profilefield1" placeholder="Put Staff Password..." class="col-xs-10 col-sm-5" />
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
                            <input readonly required type="text" name="edit_field3" id="edit_Profilefield3" placeholder="Put Staff Last Name..." class="col-xs-10 col-sm-5" />
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
                            <input style="display: none" type="text" name="edit_field11" id="edit_Profilefield11" value="Admin" class="col-xs-10 col-sm-5" />

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

