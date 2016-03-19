/**
 * Created by hamdy on 3/16/16.
 */

function ajaxCall(str,category){


    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

            return xmlhttp.responseText;

            //return kati;

        }
    }

    if (category=="schedule"){
        xmlhttp.open("GET", "viewSchedule.php?q="+str, false);
    } else if (category=="students"){
        xmlhttp.open("GET", "viewStudents.php?q="+str, false);
    } else if (category=="staff"){
        xmlhttp.open("GET", "viewStaff.php?q="+str, false);
    } else if (category=="events"){
        xmlhttp.open("GET", "viewEvents.php?q="+str, false);
    } else if (category=="exams"){
        xmlhttp.open("GET", "viewExams.php?q="+str, false);
    } else if (category=="attend"){
        xmlhttp.open("GET", "viewStudPerCor.php?q="+str, false);
    }

    xmlhttp.send();
    return xmlhttp.onreadystatechange();
    //table.fnDestroy();
}


function createTimetable(){

    var htmlCode = "<div class=\"col-sm-9\"> <div class=\"space\"></div> <div id=\"calendar\"></div> <div class=\"col-sm-3\"> <div class=\"widget-body\"> <div class=\"widget-main no-padding\"> <div id=\"external-events\"> <div class=\"external-event label-grey\" data-class=\"label-grey\"> <i class=\"ace-icon fa fa-arrows\"></i>Examinations </div> <div class=\"external-event label-danger\" data-class=\"label-danger\"> <i class=\"ace-icon fa fa-arrows\"></i>Events </div> </div> </div>";

    document.getElementById("timetable").innerHTML = htmlCode;

    var storedEvents='[';
    storedEvents+=ajaxCall("Event","events");
    storedEvents+=ajaxCall("Exam","exams");
    storedEvents+=']';


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
            events: eval(storedEvents)

            ,
            editable: true,
            //droppable: true, // this allows things to be dropped onto the calendar !!!

            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {

                //display a modal
                var modal =
                    '<div id="myModal" class="modal">\
                <div class="modal-content">\
                    <span class="close">×</span>\
                <h4 id = "label" class="blue bigger">Add an Event</h4>\
                <div   class="row">\
                    <div class="col-xs-12">\
                <hr>\
                <iframe name="dammy" onchange="addSubmitButton()" style="display: none"></iframe>\
                    <form id="addForm" method="post" target="dammy" class="form-horizontal" role="form">\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Event Number: </label>\
                <div class="col-sm-9">\
                    <input type="text" id="formName" name="formName"  class="col-xs-10 col-sm-5" />\
                    <input type="text" name="field0" placeholder="Here goes the event Number" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name of the Event: </label>\
                <div class="col-sm-9">\
                    <input required type="text"  name="field1" placeholder="What is the name of the new Event..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date: </label>\
\
                <div class="col-sm-9">\
                    <input type="text" name="field2" id="field2" class="col-xs-10 col-sm-5" value="2000-01-01" />\
\
                    <select onchange=\'getDate("Day","Month","Year","field8")\' class="chosen-select form-control" id="Day" data-placeholder="Choose a Day...">\
                    <option value="01">1</option>\
                    <option value="02">2</option>\
                    <option value="03">3</option>\
                    <option value="04">4</option>\
                    <option value="05">5</option>\
                    <option value="06">6</option>\
                    <option value="07">7</option>\
                    <option value="08">8</option>\
                    <option value="09">9</option>\
                    <option value="10">10</option>\
                    <option value="11">11</option>\
                    <option value="12">12</option>\
                    <option value="13">13</option>\
                    <option value="14">14</option>\
                    <option value="15">15</option>\
                    <option value="16">16</option>\
                    <option value="17">17</option>\
                    <option value="18">18</option>\
                    <option value="19">19</option>\
                    <option value="20">20</option>\
                    <option value="21">21</option>\
                    <option value="22">22</option>\
                    <option value="23">23</option>\
                    <option value="24">24</option>\
                    <option value="25">25</option>\
                    <option value="26">26</option>\
                    <option value="27">27</option>\
                    <option value="28">28</option>\
                    <option value="29">29</option>\
                    <option value="30">30</option>\
                    <option value="31">31</option>\
                    </select>\
                    <br>\
                    <select onchange=\'getDate("Day","Month","Year","field8")\' class="chosen-select form-control" id="Month" data-placeholder="Choose a Day...">\
                    <option value="01">January</option>\
                    <option value="02">February</option>\
                    <option value="03">March</option>\
                    <option value="04">April</option>\
                    <option value="05">May</option>\
                    <option value="06">June</option>\
                    <option value="07">July</option>\
                    <option value="08">August</option>\
                    <option value="09">September</option>\
                    <option value="10">October</option>\
                    <option value="11">November</option>\
                    <option value="12">December</option>\
                    </select>\
                    <br>\
                    <input onchange=\'getDate("Day","Month","Year","field8")\' type="text" id="Year" value="2000" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start Time: </label>\
                <div class="col-sm-9">\
                    <input required type="text" name="field3" placeholder="e.g. 18:45" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> End Time: </label>\
                <div class="col-sm-9">\
                    <input required type="text" name="field4" placeholder="e.g. 18:45" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Location: </label>\
                <div class="col-sm-9">\
                    <input required type="text" name="field5" placeholder="Where is going to take place..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description of the event or examination: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" name="field6" placeholder="A short Description about the event or examination..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                        \
                    <div class="clearfix form-actions">\
                    <div class="col-md-offset-3 col-md-9">\
                    <button class="btn btn-info" type="submit" onclick="addSubmitButton()">\
                    <i class="ace-icon fa fa-check bigger-110"></i>\
                    Submit\
                    </button>\
                    \
                    &nbsp; &nbsp; &nbsp;\
                    <button class="btn" type="reset">\
                    <i class="ace-icon fa fa-undo bigger-110"></i>\
                    Reset\
                    </button>\
                    </div>\
                    </div>\
                    </form>\
                    <!-- PAGE CONTENT ENDS -->\
                    \
                </div><!-- /.col -->\
                </div><!-- /.row -->\
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

                /* commented out */

                //bootbox.prompt("New Event Title:", function(title) {
                //    if (title !== null) {
                //        calendar.fullCalendar('renderEvent',
                //            {
                //                title: title,
                //                start: start,
                //                end: end,
                //                allDay: allDay,
                //                className: 'label-info'
                //            },
                //            true // make the event "stick"
                //        );
                //    }
                //});
                //
                //
                //calendar.fullCalendar('unselect');
            }
            ,
            eventClick: function(calEvent, jsEvent, view) {

                //display a modal
                var modal =
                    '<div  id="myEditModal" class="modal">\
\
                    <!-- Modal content -->\
                <div class="modal-content">\
\
                    <span class="close">×</span>\
\
                <h4 id = "label" class="blue bigger">Edit the Event</h4>\
                <div   class="row">\
                    <div class="col-xs-12">\
                <hr>\
                <iframe name="dammy_edit" onchange="editSubmitButton()" style="display: none"></iframe>\
                    <form id="editForm" method="post"   target="dammy_edit" class="form-horizontal" role="form">\
                        \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Event Number: </label>\
                        \
                <div class="col-sm-9">\
                    <input type="text" id="editFormName" name="editFormName"  class="col-xs-10 col-sm-5" />\
                    <input type="text" id="edit_field0" name="edit_field0" placeholder="Event Number..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name of the Event: </label>\
                        \
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field1"  name="edit_field1" placeholder="Name of the Event..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
\
                <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date: </label>\
                    <div class="col-sm-9">\
                    <input type="text" style="display: none" id="edit_field2" name="edit_field2" id="field8" class="col-xs-10 col-sm-5" />\
\
                    <select onchange="getDateForEdit()" class="chosen-select form-control" id="editDay" data-placeholder="Choose a Day...">\
                    <option value="01">1</option>\
                    <option value="02">2</option>\
                    <option value="03">3</option>\
                    <option value="04">4</option>\
                    <option value="05">5</option>\
                    <option value="06">6</option>\
                    <option value="07">7</option>\
                    <option value="08">8</option>\
                    <option value="09">9</option>\
                    <option value="10">10</option>\
                    <option value="11">11</option>\
                    <option value="12">12</option>\
                    <option value="13">13</option>\
                    <option value="14">14</option>\
                    <option value="15">15</option>\
                    <option value="16">16</option>\
                    <option value="17">17</option>\
                    <option value="18">18</option>\
                    <option value="19">19</option>\
                    <option value="20">20</option>\
                    <option value="21">21</option>\
                    <option value="22">22</option>\
                    <option value="23">23</option>\
                    <option value="24">24</option>\
                    <option value="25">25</option>\
                    <option value="26">26</option>\
                    <option value="27">27</option>\
                    <option value="28">28</option>\
                    <option value="29">29</option>\
                    <option value="30">30</option>\
                    <option value="31">31</option>\
                    </select>\
                    <br>\
                    <select onchange="getDateForEdit()" class="chosen-select form-control" id="editMonth" data-placeholder="Choose a Day...">\
                    <option value="01">January</option>\
                    <option value="02">February</option>\
                    <option value="03">March</option>\
                    <option value="04">April</option>\
                    <option value="05">May</option>\
                    <option value="06">June</option>\
                    <option value="07">July</option>\
                    <option value="08">August</option>\
                    <option value="09">September</option>\
                    <option value="10">October</option>\
                    <option value="11">November</option>\
                    <option value="12">December</option>\
                    </select>\
                    <br>\
                    <input onchange="getDateForEdit()" type="text" id="editYear" value="2000" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                        \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start Time: </label>\
                        \
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field3" id="edit_field3" name="edit_field3" placeholder="e.g. 18:00" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                        \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> End Time: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field4" name="edit_field4" placeholder="e.g. 18:00" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
\
                        \
                        \
                        <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Location: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field5" name="edit_field5" placeholder="Location..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                    \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field6" name="edit_field6" placeholder="Description..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                        \
                        \
                    <div class="clearfix form-actions">\
                    <div class="col-md-offset-3 col-md-9">\
                    <button class="btn btn-info" type="submit" onclick="editSubmitButton()">\
                    <i class="ace-icon fa fa-check bigger-110"></i>\
                    Submit\
                    </button>\
                        \
                    &nbsp; &nbsp; &nbsp;\
                <button class="btn" type="reset">\
                    <i class="ace-icon fa fa-undo bigger-110"></i>\
                    Reset\
                    </button>\
                    </div>\
                    </div>\
                    </form>\
                    <!-- PAGE CONTENT ENDS -->\
                        \
                </div><!-- /.col -->\
                </div><!-- /.row -->\
                        \
\
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

}