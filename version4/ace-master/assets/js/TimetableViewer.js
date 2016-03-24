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
    } else if (category=="class"){
        xmlhttp.open("GET", "viewClass.php?q="+str, false);
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
                var answer = prompt("Type \"Event\" to addevent or \"Exam\" to add an exam.");
                var x=start._d;
                var fullDate= x.toLocaleString();
                var sptext = fullDate.split(",");
                var date = sptext[0];
                var hour = sptext[1];
                var sptext2=date.split("/");
                var correctday = sptext2[2] + "-" +sptext2[0] + "-" + sptext2[1]; //Actual Event Date


                var flag = false;
                while (!flag) {
                if (answer==null){
                    return;
                }
                else if (answer == "Event") {
                        //display a modal
                        var modal =
                            '<div id="addEventModal" class="modal">\
                        <div class="modal-content">\
                            <span class="close">×</span>\
                        <h4 id = "label" class="blue bigger">Add an Event</h4>\
                        <div   class="row">\
                            <div class="col-xs-12">\
                        <hr>\
                        <iframe style="display: none" name="dammy"></iframe>\
                            <form id="addForm" method="post" target="dammy" class="form-horizontal" role="form">\
                            <div class="form-group">\
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Event Number: </label>\
                        <div class="col-sm-9">\
                            <input style="display: none" type="text" id="formName" name="formName" value="Event"  class="col-xs-10 col-sm-5" />\
                            <input required type="text" name="field0" placeholder="Here goes the event Number" class="col-xs-10 col-sm-5" />\
                            </div>\
                            </div>\
                            <div class="form-group">\
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name of the Event: </label>\
                        <div class="col-sm-9">\
                            <input required type="text"  name="field1" placeholder="What is the name of the new Event..." class="col-xs-10 col-sm-5" />\
                            </div>\
                            </div>\
                            <div style="display: none" class="form-group">\
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date: </label>\
                        <div class="col-sm-9">\
                            <input type="text" name="field2" id="field2" class="col-xs-10 col-sm-5" value="' + correctday + '"/>\
                    </div>\
                    </div>\
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
                    <button class="btn btn-info" type="submit" onclick="addEventSubmitButton()">\
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
                        flag = true;
                    }
                    else if (answer == "Exam") {
                        var modal =
                            '<div id="addEventModal" class="modal">\
                        <div class="modal-content">\
                            <span class="close">×</span>\
                        <h4 id = "label" class="blue bigger">Add an Exam</h4>\
                        <div   class="row">\
                            <div class="col-xs-12">\
                        <hr>\
                        <iframe style = "display :none" name="dammy"></iframe>\
                            <form id="addForm" method="post" target="dammy" class="form-horizontal" role="form">\
                            <div class="form-group">\
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exam Code: </label>\
                        <div class="col-sm-9">\
                            <input style="display: none" type="text" id="formName" name="formName" value="Exam"  class="col-xs-10 col-sm-5" />\
                            <input required type="text" name="field0" placeholder="Here goes the exam code" class="col-xs-10 col-sm-5" />\
                            </div>\
                            </div>\
                            <div class="form-group">\
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exam Title: </label>\
                        <div class="col-sm-9">\
                            <input required type="text"  name="field1" placeholder="What is the title of the new Exam..." class="col-xs-10 col-sm-5" />\
                            </div>\
                            </div>\
                            <div class="form-group">\
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Module Code: </label>\
                        <div class="col-sm-9">\
                            <input type="text" name="field2" id="field2" placeholder="What is the module code of the new Exam..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Module Description: </label>\
                <div class="col-sm-9">\
                    <input required type="text" name="field3" placeholder="What is the module description of the new Exam..." class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div style="display: none" class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exam Session Date: </label>\
                <div  class="col-sm-9">\
                    <input  required type="text" name="field4" value="' +correctday + '"class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start Time: </label>\
                <div class="col-sm-9">\
                    <input required type="text" name="field5" placeholder="e.g 11:00:00" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Test Center: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" name="field6" placeholder="Here goes the exam test center" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\                    <div class="clearfix form-actions">\
                    <div class="col-md-offset-3 col-md-9">\
                    <button class="btn btn-info" type="submit" onclick="addEventSubmitButton()">\
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
                        flag = true;
                    }
                    else {
                        flag = false;
                        alert("wrong choice");
                        answer = prompt("Type \"Event\" to addevent or \"Exam\" to add an exam.");
                    }
                }

                var modal = $(modal).appendTo('body');
                modal.find('addForm').on('submit', function(ev){
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
                if (calEvent.color == "#d15b47") {
                    var correctDay = calEvent.start._d.getUTCFullYear() + "-" + (calEvent.start._d.getMonth() + 1) + "-" + calEvent.start._d.getDate();
                    var time = calEvent.start._d.toTimeString().split(" ");
                    var startTime = time[0];
                    var endTimeSp = calEvent.end._d.toTimeString().split(" ");
                    var endTime = endTimeSp[0];

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
                    <iframe style="display: none" name="dammy_edit" ></iframe>\
                        <form id="editForm" method="post"   target="dammy_edit" class="form-horizontal" role="form">\
                            \
                        <div class="form-group">\
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Event Number: </label>\
                            \
                    <div class="col-sm-9">\
                        <input type="text" style="display: none" id="editFormName" name="editFormName" value="Event"  class="col-xs-10 col-sm-5" />\
                        <input readonly type="text" id="edit_field0" name="edit_field0" value="' + calEvent.id + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name of the Event: </label>\
                        \
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field1"  name="edit_field1" value="' + calEvent.title + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
\
                <div style="display: none" class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Date: </label>\
                    <div class="col-sm-9">\
                    <input type="text" id="edit_field2" name="edit_field2" value="' + correctDay + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                        \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start Time: </label>\
                        \
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field3" id="edit_field3" name="edit_field3" value="' + startTime + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                        \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> End Time: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field4" name="edit_field4" value="' + endTime + '" class="col-xs-10 col-sm-5" />\
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
                    <input required type="text" id="edit_field5" name="edit_field5" value="' + calEvent.location + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                    \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field6" name="edit_field6" value="' + calEvent.description + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                        \
                        \
                    <div class="clearfix form-actions">\
                    <div class="col-md-offset-3 col-md-9">\
                    <button class="btn btn-info" type="submit" onclick="editEventSubmitButton()">\
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
                }
                else{
                    var correctDay = calEvent.start._d.getUTCFullYear() + "-" + (calEvent.start._d.getMonth() + 1) + "-" + calEvent.start._d.getDate();
                    var time = calEvent.start._d.toTimeString().split(" ");
                    var startTime = time[0];
                    var examSp = calEvent.id.split(" ");
                    var examCode = examSp[1];
                    var moduleCode = examSp[0];

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
                    <iframe style="display: none" name="dammy_edit" ></iframe>\
                        <form id="editForm" method="post"   target="dammy_edit" class="form-horizontal" role="form">\
                            \
                        <div class="form-group">\
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exam Code: </label>\
                            \
                    <div class="col-sm-9">\
                        <input type="text" style="display: none" id="editFormName" name="editFormName" value="Exam"  class="col-xs-10 col-sm-5" />\
                        <input readonly type="text" id="edit_field0" name="edit_field0" value="' + examCode + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exam Title: </label>\
                        \
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field1"  name="edit_field1" value="' + calEvent.title + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
\
                <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Module Code: </label>\
                    <div class="col-sm-9">\
                    <input type="text" id="edit_field2" name="edit_field2" value="' + moduleCode + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                        \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Module Description: </label>\
                        \
                <div class="col-sm-9">\
                    <input type="text" id="edit_field3" id="edit_field3" name="edit_field3" value="' + calEvent.description + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                        \
                    <div style="display: none" class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Exam Session Date: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text"  id="edit_field4" name="edit_field4" value="' + correctDay + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
\
\
                        \
                        \
                        <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start Time: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field5" name="edit_field5" value="' + startTime + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    \
                    \
                    <div class="form-group">\
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Test Center Name: </label>\
\
                <div class="col-sm-9">\
                    <input required type="text" id="edit_field6" name="edit_field6" value="' + calEvent.location + '" class="col-xs-10 col-sm-5" />\
                    </div>\
                    </div>\
                    <div class="col-md-offset-3 col-md-9">\
                    <button class="btn btn-info" type="submit" onclick="editEventSubmitButton()">\
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
                }




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

function addEventSubmitButton(){

    var elements = document.getElementById("addForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }

    document.forms["addForm"].action = 'readForm.php';
    document.forms["addForm"].submit();
    window.setTimeout(EventFun,2000);
}

function EventFun() {
    var modal =  document.getElementById('addEventModal');
    modal.style.visibility = "hidden";
    modal.remove();
    createTimetable();
    document.documentElement.style.overflow = "auto";
    document.body.style.marginRight='0px';
}

function editEventSubmitButton(){
    var elements = document.getElementById("editForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }

    document.forms["editForm"].action = 'readEditForm.php';
    document.forms["editForm"].submit();
    window.setTimeout(EventFun2,2000);
}
function EventFun2() {
    var modal =  document.getElementById('myEditModal');
    modal.style.visibility = "hidden";
    modal.remove();
    createTimetable();
    document.documentElement.style.overflow = "auto";
    document.body.style.marginRight='0px';
}