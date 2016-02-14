<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TechnoPedia Admin</title>
        <link type="text/css" href="bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
              rel='stylesheet'>
        <script type="text/javascript">
            function show_popup() {
                var p = window.createPopup()
                var pbody = p.document.body
                pbody.style.backgroundColor = "lime"
                pbody.style.border = "solid black 1px"
                pbody.innerHTML = "This is a pop-up! Click outside to close."
                p.show(150,150,200,50,document.body)
            }

        </script>
    </head>
<body>
<div class="navbar navbar-fixed-top" >
    <div class="navbar-inner" style="background-color:#2d2b32">
        <div class="container" style="background-color:#2d2b32;">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" onclick="show_popup" href="index.html">TechnoPedia</a>
            <div class="nav-collapse collapse navbar-inverse-collapse" style="left: 0px; top: 0px">
                <ul class="nav pull-left">
                    <li><a href="#" style="background-color:gray; color:white">Timetable</a></li>
                    <li><a href="#" style="color:white">Students</a></li>
                    <li><a href="#" style="color:white">Staff</a></li>
                    <li><a href="#" style="color:white">Schedule</a></li>
                    <li><a href="#" style="color:white">Events</a></li>
                    <li><a href="#" style="color:white">Attendances</a></li>
                    <li><a href="#" style="color:white">Fees</a></li>
                    <li><a href="#" style="color:white">Exams&Results</a></li>
                    <li><a href="#" style="color:white">Expenses</a></li>




                </ul>
            </div>
        </div>

    </div>

    <!-- /navbar-inner -->
</div>



<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">

                    <!--/.widget-nav-->


                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li><a href="#" style="background-color:#808080; color:white"><i class="menu-icon" ></i>View</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Insert</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Edit</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Delete</a></li>
                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages" style="color:white"><i class="menu-icon">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Manage Courses </a>
                            <ul id="togglePages" class="collapse unstyled">
                                <li><a href="#" ><i></i>Add</a></li>
                                <li><a href="#"><i></i>View</a></li>
                                <li><a href="#"><i></i>Edit</a></li>
                                <li><a href="#"><i></i>Delete</a></li>
                            </ul>
                        </li>
                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages2" style="color:white"><i class="menu-icon">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Manage Rooms </a>
                            <ul id="togglePages2" class="collapse unstyled">
                                <li><a href="#"><i></i>Add</a></li>
                                <li><a href="#"><i></i>View</a></li>
                                <li><a href="#"><i></i>Edit</a></li>
                                <li><a href="#"><i></i>Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <!--/#btn-controls-->
                    <!--/.module-->
                    <div class="module hide">
                        <div class="module-head">
                            <h3>
                                Adjust Budget Range</h3>
                        </div>
                        <div class="module-body">
                            <div class="form-inline clearfix">
                                <a href="#" class="btn pull-right">Update</a>
                                <label for="amount">
                                    Price range:</label>
                                &nbsp;
                                <input type="text" id="amount" class="input-" />
                            </div>
                            <hr />
                            <div class="slider-range">
                            </div>
                        </div>
                    </div>
                    <div class="module">
                        <div class="module-head">
                            <h3>
                                DataTables</h3>
                        </div>
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Start Date
                                    </th>
                                    <th>
                                        End Date
                                    </th>
                                    <th>
                                        Classroom
                                    </th>
                                    <th>
                                        Class
                                    </th>
                                    <th>
                                        Course
                                    </th>
                                    <th>
                                        Teacher
                                    </th>
                                    <th>
                                        Days
                                    </th>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        End Time
                                    </th>
                                    <th>
                                        Num Of Students
                                    </th>






                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Start Date
                                    </th>
                                    <th>
                                        End Date
                                    </th>
                                    <th>
                                        Classroom
                                    </th>
                                    <th>
                                        Class
                                    </th>
                                    <th>
                                        Course
                                    </th>
                                    <th>
                                        Teacher
                                    </th>
                                    <th>
                                        Days
                                    </th>
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        End Time
                                    </th>
                                    <th>
                                        Num Of Students
                                    </th>


                                </tbody>
                                <tfoot>
                            </table>
                        </div>
                    </div>
                    <!--/.module-->
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
    </div>
</div>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="scripts/common.js" type="text/javascript"></script>

</body>
