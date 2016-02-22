<!DOCTYPE html>
<html lang="en">

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
        <link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />
		<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
		<script type='text/javascript' src='scripts/jquery.js'></script>
		<script type='text/javascript' src='scripts/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='scripts/osx.js'></script>


    </head>
    <body>
        <?php
        include 'MainMenu.php';
        ?>

        <script type="text/javascript">
            document.getElementById("staff").style.backgroundColor="gray";
        </script>




        <!-- /navbar -->
    <div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">

                    <!--/.widget-nav-->


                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li><a href="#" style="background-color:#808080; color:white"><i class="menu-icon "></i>View</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon" ></i>Add</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Edit</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Reports</a></li>
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
                                        Username
                                    </th>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Edit / Delete
                                    </th>


                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <th>
                                        aviola02
                                    </th>
                                    <th>
                                        Andreas
                                    </th>
                                    <th>
                                        Violantis
                                    </th>
                                    <th>
                                        <input type='image' src="images/eye_logo.png" alt="view" name='osx' class='osx demo' height="16" width="16" />
                                        <div id="osx-modal-content">
                                            <div id="osx-modal-title">OSX Style Modal Dialog</div>
                                            <div class="close"><a href="#" class="simplemodal-close">x</a></div>
                                            <div id="osx-modal-data">
                                                <h2>More Details</h2>
                                                <?php
                                                include 'pullData.php';

                                                ?>
                                                <p><button class="simplemodal-close">Close</button> <span>(or press ESC or click the overlay)</span></p>
                                            </div>
                                        </div>

                                        <!--<button type="button" name='osx' value='Demo' class='osx demo'><img alt="edit" src="images/eye_logo.png" height="16" width="16"/></button>-->
                                        <input type='image' src="images/edit_logo.png" alt="view" name='osx' height="16" width="16" />
                                        <input type='image' src="images/delete_logo.png" alt="view" name='osx' height="16" width="16" />
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
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
    </body>
