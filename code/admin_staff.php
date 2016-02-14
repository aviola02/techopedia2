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
        <link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />
		<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
		<script type='text/javascript' src='scripts/jquery.js'></script>
		<script type='text/javascript' src='scripts/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='scripts/osx.js'></script>


    </head>
    <body>
        <div class="navbar navbar-fixed-top" >
            <div class="navbar-inner" style="background-color:#2d2b32">
                <div class="container" style="background-color:#2d2b32;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">TechnoPedia</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse" style="left: 0px; top: 0px">
                        <ul class="nav pull-left">
                            <li><a href="admin_timetable_view.html" style="color:white">Timetable</a></li>
                            <li><a href="#" style="color:white">Students</a></li>
                            <li><a href="#" style="background-color:gray; color:white">Staff</a></li>
							<li><a href="#" style="color:white">Scedule</a></li>
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
                                        <?php
                                        $dbh= mysql_connect('phpmyadmin.in.cs.ucy.ac.cy','technopedia2','WbJPQrRav5')
										or die("Couldn't connect to database.");
								
										$db = mysql_select_db("technopedia2", $dbh) 
										or die("Couldn't select database.");
								
										$sql= 'SELECT Username,FirstName,LastName FROM Staff';
										
										$result = mysql_query($sql) 
										or die("Something is wrong with your SQL statement.");
                                           
                                           while ($row = mysql_fetch_array($result)) {
 											$username = $row['Username'];
 											$name = $row['FirstName'];
 											$surname = $row['LastName'];
                                            echo '<tr>';
                                                echo '<th>';
                                                    echo $username;
                                                echo '</th>';
                                                echo '<th>';
                                                    echo $name;
                                                echo '</th>';
                                                echo '<th>';
                                                    echo $surname;
                                                echo '</th>';
                                                echo '<th>';
                                                 
                                                    echo'<input type='button' name='osx' value='Demo' class='osx demo'/>';
                                                    echo '<button type="button" name='osx' value='Demo' class='osx demo'><img alt="edit" src="images/eye_logo.png" height="16" width="16"/></button>';
                                                    echo '<button><img alt="edit" src="images/edit_logo.png" height="16" width="16"/></button>';
                                                    echo '<button style="background-color:red"><img alt="delete" src="images/delete_logo.png" height="16" width="16"/></button>';
                                                	
                                                echo '</th>';
   												}
   												
   										mysql_close($dbh);		
                                        ?>
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
        
        <script>$('#myModal').on('show.bs.modal', function (e) {
		    $(this).find('.modal-body').html('Fired By: ' + e.relatedTarget.id);
		})
		</script>
      
    </body>
