<<<<<<< HEAD
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
                        <img class="nav-user-photo" src="assets/avatars/avatar4.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome</small>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
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

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="">
                <a id = "showStudents" onclick=showStudents("Student")>
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> Students </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a onclick=showStaff("Staff")>
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> Staff </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Forms </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="form-elements.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Form Elements
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="form-elements-2.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Form Elements 2
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="form-wizard.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Wizard &amp; Validation
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="wysiwyg.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Wysiwyg &amp; Markdown
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="dropzone.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Dropzone File Upload
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a onclick="showTimetable()">
                    <i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Timetable

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
                </a>

                <b class="arrow"></b>
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

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
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
                        <table id="staff-table"></table>

                        <div id="staff-pager"></div>
                        <script type="text/javascript">
                            //var $path_base = ".";//in Ace demo this will be used for editurl parameter
                        </script>
                        <hr>



                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="space"></div>

                                        <div id="calendar"></div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="widget-box transparent">
                                            <div class="widget-header">
                                                <h4>Draggable events</h4>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                                    <div id="external-events">
                                                        <div class="external-event label-grey" data-class="label-grey">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 1
                                                        </div>

                                                        <div class="external-event label-success" data-class="label-success">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 2
                                                        </div>

                                                        <div class="external-event label-danger" data-class="label-danger">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 3
                                                        </div>

                                                        <div class="external-event label-purple" data-class="label-purple">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 4
                                                        </div>

                                                        <div class="external-event label-yellow" data-class="label-yellow">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 5
                                                        </div>

                                                        <div class="external-event label-pink" data-class="label-pink">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 6
                                                        </div>

                                                        <div class="external-event label-info" data-class="label-info">
                                                            <i class="ace-icon fa fa-arrows"></i>
                                                            My Event 7
                                                        </div>

                                                        <label>
                                                            <input type="checkbox" class="ace ace-checkbox" id="drop-remove" />
                                                            <span class="lbl"> Remove after drop</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
<!---->
<!---->
<!---->
<!--                        <!-- PAGE CONTENT ENDS -->
<!--                    </div><!-- /.col -->
<!--                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

                &nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
						</span>
            </div>
        </div>
    </div>

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
                            <input type="text" id="formName" name="formName"  class="col-xs-10 col-sm-5" />
                            <input type="text" name="field0" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
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
                            <input required type="text" name="field6" placeholder="ID Type..." class="col-xs-10 col-sm-5" />
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
                            <input type="text" name="field8" id="field8" class="col-xs-10 col-sm-5" value="2000-01-01" />

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
                <iframe name="dammy_edit" onchange="editSubmitButton()" style="display: none"></iframe>
                <form id="editForm" method="post"   target="dammy_edit" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Candidate ID: </label>

                        <div class="col-sm-9">
                            <input type="text" id="editFormName" name="editFormName"  class="col-xs-10 col-sm-5" />
                            <input type="text" id="edit_field0" name="edit_field0" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
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
                    <iframe name="dammy2" ></iframe>
                    <form id="addStaffForm" method="post" target="dammy2" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>

                            <div class="col-sm-9">
                                <input  type="text" id="staffFormName" name="formName"  class="col-xs-10 col-sm-5" />
                                <input type="text" name="field0" placeholder="Put Username..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff Password: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field1" placeholder="Put Staff Password..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field2" placeholder="Put Staff First Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field3" placeholder="Put Staff Last Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field4" id="addStaff_field4" value="2000-01-01" class="col-xs-10 col-sm-5" />

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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Picture: </label>

                            <div class="col-sm-9">
                                <input type="file" name="field7" placeholder="Add Employee Picture..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Joining: </label>

                            <div class="col-sm-9">
                                <input type="text"name="field8" id="addStaff_field8" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("StaffDay2","StaffMonth2","StaffYear2","addStaff_field8")' class="chosen-select form-control" id="StaffDay2" data-placeholder="Choose a Day...">
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
                                <select onchange='getDate("StaffDay2","StaffMonth2","StaffYear2","addStaff_field8")' class="chosen-select form-control" id="StaffMonth2" data-placeholder="Choose a Day...">
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
                                <input onchange='getDate("StaffDay2","StaffMonth2","StaffYear2","addStaff_field8")' type="text" id="StaffYear2" value="2000" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Experience: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field9" placeholder="Put Experience..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Category: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field10" placeholder="Put Employee Category..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field11" placeholder="Put Email..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input type="text" name="field12" id="addStaff_field12" value="admin" class="col-xs-10 col-sm-5" />

                                <select onchange="getDate()" class="chosen-select form-control" id="Type" data-placeholder="Choose a Day...">
                                    <option value="01">Admin</option>
                                    <option value="02">Secretary</option>
                                    <option value="03">Teacher</option>
                                </select>

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

            <h4 id = "staffLabel" class="blue bigger">Add a Staff</h4>
            <div   class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <hr>
                    <iframe name="dammy2" ></iframe>
                    <form id="editStaffForm" method="post" target="dammy2" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username: </label>

                            <div class="col-sm-9">
                                <input  type="text" id="staffEditFormName" name="editFormName"  class="col-xs-10 col-sm-5" />
                                <input type="text" name="edit_field0" id="edit_stafffield0" placeholder="Put Username..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff Password: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field1" id="edit_stafffield1" placeholder="Put Staff Password..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field2" id="edit_stafffield2" placeholder="Put Staff First Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field3" id="edit_stafffield3" placeholder="Put Staff Last Name..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field4" id="edit_stafffield4" id="addEditStaff_field4" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("editStaffDay","editStaffMonth","editStaffYear","addEditStaff_field4")' class="chosen-select form-control" id="editStaffDay" data-placeholder="Choose a Day...">
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
                                <select onchange='getDate("editStaffDay","editStaffMonth","editStaffYear","addEditStaff_field4")' class="chosen-select form-control" id="editStaffMonth" data-placeholder="Choose a Day...">
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
                                <input onchange='getDate("editStaffDay","editStaffMonth","editStaffYear","addEditStaff_field4")' type="text" id="editStaffYear" value="2000" class="col-xs-10 col-sm-5" />
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
                                <input type="text" name="edit_field7" id="edit_stafffield7" id="addEditStaff_field8" value="2000-01-01" class="col-xs-10 col-sm-5" />

                                <select onchange='getDate("editStaffDay2","editStaffMonth2","editStaffYear2","addEditStaff_field7")' class="chosen-select form-control" id="editStaffDay2" data-placeholder="Choose a Day...">
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
                                <select onchange='getDate("editStaffDay2","editStaffMonth2","editStaffYear2","addEditStaff_field7")' class="chosen-select form-control" id="editStaffMonth2" data-placeholder="Choose a Day...">
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
                                <input onchange='getDate("editStaffDay2","editStaffMonth2","editStaffYear2","addEditStaff_field7")' type="text" id="editStaffYear2" value="2000" class="col-xs-10 col-sm-5" />
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
                                <input type="text" name="edit_field10" id="edit_stafffield10" placeholder="Put Email..." class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date of Birth: </label>

                            <div class="col-sm-9">
                                <input type="text" name="edit_field11" id="edit_stafffield11" value="admin" class="col-xs-10 col-sm-5" />

                                <select class="chosen-select form-control" id="editType" data-placeholder="Choose a Day...">
                                    <option value="01">Admin</option>
                                    <option value="02">Secretary</option>
                                    <option value="03">Teacher</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Picture: </label>

                                <div class="col-sm-9">
                                    <input type="file" name="edit_field12" id="edit_stafffield12" placeholder="Add Employee Picture..." class="col-xs-10 col-sm-5" />
                                </div>
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

<script src="assets/js/date.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/fullcalendar.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {

        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });




        /* initialize the calendar
         -----------------------------------------------------------------*/

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();


        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            buttonHtml: {
                prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                next: '<i class="ace-icon fa fa-chevron-right"></i>'
            },

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    className: 'label-important'
                },
                {
                    title: 'Long Event',
                    start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
                    end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
                    className: 'label-success'
                },
                {
                    title: 'Some Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false,
                    className: 'label-info'
                }
            ]
            ,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                var $extraEventClass = $(this).attr('data-class');


                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            }
            ,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {

                bootbox.prompt("New Event Title:", function(title) {
                    if (title !== null) {
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,
                                className: 'label-info'
                            },
                            true // make the event "stick"
                        );
                    }
                });


                calendar.fullCalendar('unselect');
            }
            ,
            eventClick: function(calEvent, jsEvent, view) {

                //display a modal
                var modal =
                    '<div class="modal fade">\
                      <div class="modal-dialog">\
                       <div class="modal-content">\
                         <div class="modal-body">\
                           <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
                           <form class="no-margin">\
                              <label>Change event name &nbsp;</label>\
                              <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
					 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';


                var modal = $(modal).appendTo('body');
                modal.find('form').on('submit', function(ev){
                    ev.preventDefault();

                    calEvent.title = $(this).find("input[type=text]").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    modal.modal("hide");
                });
                modal.find('button[data-action=delete]').on('click', function() {
                    calendar.fullCalendar('removeEvents' , function(ev){
                        return (ev._id == calEvent._id);
                    })
                    modal.modal("hide");
                });

                modal.modal('show').on('hidden', function(){
                    modal.remove();
                });


                //console.log(calEvent.id);
                //console.log(jsEvent);
                //console.log(view);

                // change the border color just for fun
                //$(this).css('border-color', 'red');

            }

        });


    })
</script>

</body>
</html>
=======
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

<body onload="setTitle()" class="no-skin">
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
            <a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Secretary
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="grey">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-tasks"></i>
                        <span class="badge badge-grey">4</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-check"></i>
                            4 Tasks to complete
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Software Update</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-mini">
                                            <div style="width:65%" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Hardware Upgrade</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-mini">
                                            <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Unit Testing</span>
                                            <span class="pull-right">15%</span>
                                        </div>

                                        <div class="progress progress-mini">
                                            <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Bug Fixes</span>
                                            <span class="pull-right">90%</span>
                                        </div>

                                        <div class="progress progress-mini progress-striped active">
                                            <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">
                                See tasks with details
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            8 Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="btn btn-xs btn-primary fa fa-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            5 Messages
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="inbox.html">
                                See all messages
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="profile.html">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
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

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="">
                <a onclick=showStudents("Student")>
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> Students </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a onclick=showStaff("Staff")>
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> Staff </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Forms </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="form-elements.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Form Elements
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="form-elements-2.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Form Elements 2
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="form-wizard.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Wizard &amp; Validation
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="wysiwyg.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Wysiwyg &amp; Markdown
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="dropzone.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Dropzone File Upload
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a onclick="showTimetable()">
                    <i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Timetable

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
                </a>

                <b class="arrow"></b>
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

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
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

                        <hr>
                        <table id="staff-table"></table>

                        <div id="staff-pager"></div>
<!--                        <script type="text/javascript">-->
<!--                            var $path_base = ".";//in Ace demo this will be used for editurl parameter-->
<!--                        </script>-->
                        <hr>


                        <div class="row">
                            <div class="col-sm-9">
                                <div class="space"></div>

                                <div id="calendar"></div>
                            </div>

                            <div class="col-sm-3">
                                <div class="widget-box transparent">
                                    <div class="widget-header">
                                        <h4>Draggable events</h4>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div id="external-events">
                                                <div class="external-event label-grey" data-class="label-grey">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 1
                                                </div>

                                                <div class="external-event label-success" data-class="label-success">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 2
                                                </div>

                                                <div class="external-event label-danger" data-class="label-danger">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 3
                                                </div>

                                                <div class="external-event label-purple" data-class="label-purple">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 4
                                                </div>

                                                <div class="external-event label-yellow" data-class="label-yellow">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 5
                                                </div>

                                                <div class="external-event label-pink" data-class="label-pink">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 6
                                                </div>

                                                <div class="external-event label-info" data-class="label-info">
                                                    <i class="ace-icon fa fa-arrows"></i>
                                                    My Event 7
                                                </div>

                                                <label>
                                                    <input type="checkbox" class="ace ace-checkbox" id="drop-remove" />
                                                    <span class="lbl"> Remove after drop</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



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
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

                &nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
						</span>
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- The ADD Modal -->
<div  id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <span class="close">×</span>

        <h4 id = "label" class="blue bigger">Add a Student</h4>
        <div   class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <hr>
                <form action="readForm.php" method="post" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Candidate ID: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" id="formName" name="formName"  class="col-xs-10 col-sm-5" />
                            <input type="text" name="field0" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
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
                            <input required type="text" name="field6" placeholder="ID Type..." class="col-xs-10 col-sm-5" />
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
                            <input type="text" style="display: none" name="field8" id="field8" class="col-xs-10 col-sm-5" />

                            <select onchange="getDate()" class="chosen-select form-control" id="Day" data-placeholder="Choose a Day...">
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
                            <select onchange="getDate()" class="chosen-select form-control" id="Month" data-placeholder="Choose a Day...">
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
                            <input onchange="getDate()" type="text" id="Year" value="2000" class="col-xs-10 col-sm-5" />
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
                            <button class="btn btn-info" type="submit">
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
                <form id="editForm" action="readEditForm.php" method="post" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Candidate ID: </label>

                        <div class="col-sm-9">
                            <input style="display: none" type="text" id="editFormName" name="editFormName"  class="col-xs-10 col-sm-5" />
                            <input type="text" id="edit_field0" name="edit_field0" placeholder="Put Candidate ID..." class="col-xs-10 col-sm-5" />
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
                            <button class="btn btn-info" type="submit">
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

<script src="assets/js/date.js"></script>

</body>
</html>
>>>>>>> 16ac76dc582df28e5c4358223e3a7e3f07968021
