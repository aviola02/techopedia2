<!DOCTYPE html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js">                        <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Secretary</title>
    <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
    <meta name="viewport" content="width=device-width">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap-responsive.min.css">
    <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/calendar.css">
    <link type="text/css" rel="stylesheet" href="assets/css/DT_bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/responsive-tables.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <script type="text/javascript" src="assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome-ie7.min.css"/>
    <![endif]-->

</head>
<body>
<!-- BEGIN WRAP -->
<div id="wrap">
    <!-- BEGIN HEADER.head -->
    <header class="head">
        <div class="search-bar">
            <div class="row-fluid">
                <div class="span12">
                    <div class="search-bar-inner">
                        <a id="menu-toggle" href="#menu" data-toggle="collapse"
                           class="accordion-toggle btn btn-inverse visible-phone"
                           rel="tooltip" data-placement="bottom" data-original-title="Show/Hide Menu">
                            <i class="icon-sort"></i>
                        </a>

                        <form class="main-search">
                            <input class="input-block-level" type="text" placeholder="Live search...">
                            <button id="searchBtn" type="submit" class="btn btn-inverse"><i class="icon-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- ."main-bar -->
        <div class="main-bar">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <h3><i class="icon-home"></i> Secretary</h3>
                    </div>
                </div>
                <!-- /.row-fluid -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.main-bar -->
    </header>
    <!-- END HEADER.head -->

    <!-- BEGIN LEFT  -->
    <div id="left">
        <!-- .user-media -->
        <div class="media user-media hidden-phone">
            <a href="" class="user-link">
                <img src="assets/img/user.gif" alt="" class="media-object img-polaroid user-img">
                <span class="label user-label">16</span>
            </a>

            <div class="media-body hidden-tablet">
                <h5 class="media-heading">Archie</h5>
                <ul class="unstyled user-info">
                    <li><a href="">Administrator</a></li>
                    <li>Last Access : <br/>
                        <small><i class="icon-calendar"></i> 16 Mar 16:32</small>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.user-media -->

        <!-- BEGIN MAIN NAVIGATION -->
        <ul id="menu" class="unstyled accordion collapse in">

            <li class="accordion-group " >
                <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav" onclick = showStudents("Student")>
                    <i class="icon-tasks icon-large"></i> Students <span class="label label-inverse pull-right"></span>
                </a>
            </li>

            <li class="accordion-group " >
                <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav" onclick = showStaff("Staff")>
                    <i class="icon-tasks icon-large"></i> Staff <span class="label label-inverse pull-right"></span>
                </a>
            </li>

            <li class="accordion-group ">
                <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                    <i class="icon-pencil icon-large"></i> Old Classes <span class="label label-inverse pull-right">4</span>
                </a>
                <ul class="collapse " id="form-nav">
                    <li><a href="form-general.html"><i class="icon-angle-right"></i> General</a></li>
                    <li><a href="form-validation.html"><i class="icon-angle-right"></i> Validation</a></li>
                    <li><a href="form-wysiwyg.html"><i class="icon-angle-right"></i> WYSIWYG</a></li>
                    <li><a href="form-wizard.html"><i class="icon-angle-right"></i> Wizard &amp; File Upload</a></li>
                </ul>
            </li>
        </ul>
        <!-- END MAIN NAVIGATION -->


    </div>
    <!-- END LEFT -->

    <!-- BEGIN MAIN CONTENT -->
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div id = "target" class="span12">
                            <div class="box">
                                <header>
<!--                                    <div class="icons"><i class="icon-edit"></i></div>-->
                                    <h5>Students</h5>
                                    <div class="toolbar">
                                        <a href="#dataTable" data-toggle="collapse" class="accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>
                                        </a>
                                    </div>
                                </header>

                                <div id="actionTable" class="body">
                                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive">
                                        <thead>
                                        <tr>
                                            <th>First Name
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Last Name
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Identity Number
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>ECDL LogBook Number
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Action
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                        </tr>
                                        </thead>



                                        <tbody id = "studentsTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                    <div class="row-fluid">
                        <div id = "target" class="span12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-edit"></i><a href="#dataTable2" data-toggle="collapse" class="accordion-toggle minimize-box">
                                        </a></div>
                                    <h5>Staff</h5>
                                    <div class="toolbar">
<!--                                        <a href="#dataTable" data-toggle="collapse" class="accordion-toggle minimize-box">-->
<!--                                            <i class="icon-chevron-up"></i>-->
<!--                                        </a>-->
                                    </div>
                                </header>

                                <div id="actionTable2" class="body">
                                    <table id="dataTable2" class="table table-bordered table-condensed table-hover table-striped responsive">
                                        <thead>
                                        <tr>
                                            <th>First Name
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Last Name
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Role
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Phone Number
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>e-Mail
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                            <th>Action
                                                <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                        </tr>
                                        </thead>



                                        <tbody id = "staffTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                    <div class="row-fluid">
                        <div class="span8">
                            <div class="box">
                                <header>
                                    <h5>Calendar</h5>
                                </header>
                                <div id="calendar_content" class="body">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->
    </div>
    <!-- END CONTENT -->


    <!-- #push do not remove -->
    <div id="push"></div>
    <!-- /#push -->
</div>
<!-- END WRAP -->

<div class="clearfix"></div>

<!-- BEGIN FOOTER -->
<div id="footer">
    <p>2013 © Metis Admin</p>
</div>
<!-- END FOOTER -->

<!-- #editModal -->
<div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="editModalLabel"><i class="icon-edit"></i> FName - LName</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label" for="CandidateID">CandidateID</label>
            <div class="controls">
                <input style="display: none" type="text" name="formName" id="formName" >
                <input type="text" name="field0" id="CandidateID" placeholder="Type CandidateID here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="NameGr">First Name (Greek):</label>
            <div class="controls">
                <input type="text" name="field1" id="NameGr" placeholder="Type First Name (Greek) here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="LNameGr">Last Name (Greek):</label>
            <div class="controls">
                <input type="text" name="field2" id="LNameGr" placeholder="Type Last Name (Greek) here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Name">First Name:</label>
            <div class="controls">
                <input type="text" name="field3" id="Name" placeholder="Type First Name here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="LName">Last Name:</label>
            <div class="controls">
                <input type="text" name="field4" id="LName" placeholder="Type Last Name here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Logbook">ECDL Logbook No:</label>
            <div class="controls">
                <input type="text" name="field5" id="Logbook" placeholder="Type ECDL Logbook No here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="IDType">ID Type:</label>
            <div class="controls">
                <input type="text" name="field6" id="IDType" placeholder="Type ID Type here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="ID">ID Number:</label>
            <div class="controls">
                <input type="text" name="field7" id="ID" placeholder="Type ID Number here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="TCenter">Test Center:</label>
            <div class="controls">
                <input type="text" name="field8" id="TCenter" placeholder="Type Test Center here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="City">City:</label>
            <div class="controls">
                <input type="text" name="field9" id="City" placeholder="Type City here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Address1">Address 1:</label>
            <div class="controls">
                <input type="text" name="field10" id="Address1" placeholder="Type Address 1 here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Address2">Address 2:</label>
            <div class="controls">
                <input type="text" name="field11" id="Address2" placeholder="Type Address 2 here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="ZIP">ZIP Code:</label>
            <div class="controls">
                <input type="text" name="field12" id="ZIP" placeholder="Type ZIP Code here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="DoB">Date of Birth:</label>
            <div class="controls">
                <input type="text" name="field13" id="DoB" placeholder="Type Date of Birth here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Father">Father's Name:</label>
            <div class="controls">
                <input type="text" name="field14" id="Father" placeholder="Type Father's Name here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Mother">Mother's Name:</label>
            <div class="controls">
                <input type="text" name="field15" id="Mother" placeholder="Type Mother's Name here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="FJob">Father's Job:</label>
            <div class="controls">
                <input type="text" name="field16" id="FJob" placeholder="Type Father's Job here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="MJob">Mother's Job:</label>
            <div class="controls">
                <input type="text" name="field17" id="MJob" placeholder="Type Mother's Job here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="FPhone">Father's Phone:</label>
            <div class="controls">
                <input type="text" name="field18" id="FPhone" placeholder="Type Father's Phone here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="MPhone">Mother's Phone:</label>
            <div class="controls">
                <input type="text" name="field19" id="MPhone" placeholder="Type Mother's Phone here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="RegistrationLevel">Registration Level:</label>
            <div class="controls">
                <input type="text" name="field20" id="RegistrationLevel" placeholder="Type Registration Level here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Town">Town/Village:</label>
            <div class="controls">
                <input type="text" name="field21" id="Town" placeholder="Type Town/Village here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="HPhone">Home Phone:</label>
            <div class="controls">
                <input type="text" name="field22" id="HPhone" placeholder="Type Home Phone here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Mobile">Mobile Phone:</label>
            <div class="controls">
                <input type="text" name="field23" id="Mobile" placeholder="Type Mobile Phone here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Work">Work Phone:</label>
            <div class="controls">
                <input type="text" name="field24" id="Work" placeholder="Type Work Phone here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="Email">Email:</label>
            <div class="controls">
                <input type="email" name="field25" id="Email" placeholder="Type Email here..." class="span6">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="doc">Document:</label>
            <div class="controls">
                <input type="file" name="field26" id="doc" placeholder="Type something here..." class="span6">
            </div>
        </div>

        <div class="form-actions">
            <button id="sbmtBtn" type="submit" class="btn btn-primary" data-dismiss="modal" >Submit</button>
        </div>
    </div>
    <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!-- /#editModal -->

<!-- #editModal2 -->
<div id="editModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="editModalLabel"><i class="icon-edit"></i> Edit Table</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
            <label for="pCode" class="control-label">Program Code</label>
            <div class="controls">
                <input type="text" id="pCode" name="pCode">
            </div>
        </div>
        <div class="control-group">
            <label for="topic" class="control-label">Topic</label>
            <div class="controls">
                <input type="text" id="topic" name="topic">
            </div>
        </div>
        <div class="control-group">
            <label for="exercises" class="control-label">Exercises</label>
            <div class="controls">
                <input type="text" id="exercises" name="exercises">
            </div>
        </div>
        <div class="control-group">
            <label for="dPicture" class="control-label">Document/Picture</label>
            <div class="controls">
                <input type="text" id="dPicture" name="dPicture">
            </div>
        </div>
        <div class="control-group">
            <label for="fName" class="control-label">Date</label>
            <div class="controls">
                <input type="text" id="fName" name="fName">
            </div>
        </div>
        <div class="form-actions">
            <button id="sbmtBtn" type="submit" class="btn btn-primary" data-dismiss="modal" >Submit</button>
        </div>
    </div>
    <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!-- /#editModal -->

<!-- #helpModal -->
<div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
    </div>
    <div class="modal-body">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.
        </p>
    </div>
    <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>window.jQuery.ui || document.write('<script src="assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>

<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/lib/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="assets/js/lib/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/lib/DT_bootstrap.js"></script>
<script type="text/javascript" src="assets/js/lib/jquery.tablesorter.min.js"></script>
<script src="assets/js/lib/responsive-tables.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript">
    $(function() {
        metisTable();
        metisTable1();
    });
</script>

<script src="assets/js/lib/jquery.mousewheel.js"></script>
<script src="assets/js/lib/jquery.sparkline.min.js"></script>
<script src="assets/flot/jquery.flot.js"></script>
<script src="assets/flot/jquery.flot.pie.js"></script>
<script src="assets/flot/jquery.flot.selection.js"></script>
<script src="assets/flot/jquery.flot.resize.js"></script>
<script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">
    $(function() {
        dashboard();
    });
</script>
<script type="text/javascript" src="assets/js/style-switcher.js"></script>

</body>
</html>