<!--/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 2/13/16
 * Time: 8:33 PM
 */!-->

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
    </head>




<?php
include 'MainMenu.php';
?>

<script type="text/javascript">
document.getElementById("student").style.backgroundColor="gray";
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
                        <li><a href="#" style="background-color:#808080; color:white"><i class="menu-icon" ></i>Add</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Edit</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Delete</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Summary</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Attendances</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Exams Performance</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>View Details</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Fees</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Student Reports</a></li>
                        <li><a href="#" style="color:white"><i class="menu-icon "></i>Import</a></li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
            <div class="span9">
                <div class="content">

                    <div class="module">
                        <div class="module-head">
                            <h3>Add a Student</h3>
                        </div>
                        <div class="module-body">



                            <form action="readForm.php" method="post" class="form-horizontal row-fluid">

                                <div class="control-group">
                                    <label class="control-label" for="CandidateID">CandidateID</label>
                                    <div class="controls">
                                        <input type="text" name="field0" id="CandidateID" placeholder="Type CandidateID here..." class="span8">
                                        <input style="display: none" type="text" name="formName" id="formName" placeholder="Type CandidateID here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="NameGr">First Name (Greek):</label>
                                    <div class="controls">
                                        <input type="text" name="field1" id="NameGr" placeholder="Type First Name (Greek) here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="LNameGr">Last Name (Greek):</label>
                                    <div class="controls">
                                        <input type="text" name="field2" id="LNameGr" placeholder="Type Last Name (Greek) here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Name">First Name:</label>
                                    <div class="controls">
                                        <input type="text" name="field3" id="Name" placeholder="Type First Name here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="LName">Last Name:</label>
                                    <div class="controls">
                                        <input type="text" name="field4" id="LName" placeholder="Type Last Name here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Logbook">ECDL Logbook No:</label>
                                    <div class="controls">
                                        <input type="text" name="field5" id="Logbook" placeholder="Type ECDL Logbook No here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="IDType">ID Type:</label>
                                    <div class="controls">
                                        <input type="text" name="field6" id="IDType" placeholder="Type ID Type here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="ID">ID Number:</label>
                                    <div class="controls">
                                        <input type="text" name="field7" id="ID" placeholder="Type ID Number here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="TCenter">Test Center:</label>
                                    <div class="controls">
                                        <input type="text" name="field8" id="TCenter" placeholder="Type Test Center here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="City">City:</label>
                                    <div class="controls">
                                        <input type="text" name="field9" id="City" placeholder="Type City here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Address1">Address 1:</label>
                                    <div class="controls">
                                        <input type="text" name="field10" id="Address1" placeholder="Type Address 1 here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Address2">Address 2:</label>
                                    <div class="controls">
                                        <input type="text" name="field11" id="Address2" placeholder="Type Address 2 here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="ZIP">ZIP Code:</label>
                                    <div class="controls">
                                        <input type="text" name="field12" id="ZIP" placeholder="Type ZIP Code here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="DoB">Date of Birth:</label>
                                    <div class="controls">
                                        <input type="text" name="field13" id="DoB" placeholder="Type Date of Birth here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Father">Father's Name:</label>
                                    <div class="controls">
                                        <input type="text" name="field14" id="Father" placeholder="Type Father's Name here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Mother">Mother's Name:</label>
                                    <div class="controls">
                                        <input type="text" name="field15" id="Mother" placeholder="Type Mother's Name here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="FJob">Father's Job:</label>
                                    <div class="controls">
                                        <input type="text" name="field16" id="FJob" placeholder="Type Father's Job here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="MJob">Mother's Job:</label>
                                    <div class="controls">
                                        <input type="text" name="field17" id="MJob" placeholder="Type Mother's Job here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="FPhone">Father's Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="field18" id="FPhone" placeholder="Type Father's Phone here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="MPhone">Mother's Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="field19" id="MPhone" placeholder="Type Mother's Phone here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="RegistrationLevel">Registration Level:</label>
                                    <div class="controls">
                                        <input type="text" name="field20" id="RegistrationLevel" placeholder="Type Registration Level here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Town">Town/Village:</label>
                                    <div class="controls">
                                        <input type="text" name="field21" id="Town" placeholder="Type Town/Village here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="HPhone">Home Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="field22" id="HPhone" placeholder="Type Home Phone here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Mobile">Mobile Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="field23" id="Mobile" placeholder="Type Mobile Phone here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Work">Work Phone:</label>
                                    <div class="controls">
                                        <input type="text" name="field24" id="Work" placeholder="Type Work Phone here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="Email">Email:</label>
                                    <div class="controls">
                                        <input type="email" name="field25" id="Email" placeholder="Type Email here..." class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="doc">Document:</label>
                                    <div class="controls">
                                        <input type="file" name="field26" id="doc" placeholder="Type something here..." class="span8">
                                    </div>
                                </div>




                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Submit Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--/.content-->
            </div><!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<div class="footer">

</div>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="scripts/common.js" type="text/javascript"></script>

</body>

</html>