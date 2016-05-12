/**
 * Created by hamdy on 3/11/16.
 *
 * In this file is implemented an asynchronus connection to the back end
 * to retrieve the appropriate data using ajax technique and fits them
 * to the proper forms in order to view them as a grid. It is mainly about
 * viewing the grid table that show the Schedule of a class.
 *
 */

var classTitle;

function showSchedule(str){
    classTitle=str;
    setAddModal(str);
    $("#schedule-table").jqGrid('GridUnload');
    $("#subgridTable").jqGrid('GridUnload');

    var grid_data= eval(ajaxCall(str,"schedule"));

    //var subgrid_data = eval();
    jQuery(function($) {

        var grid_selector = "#schedule-table";
        var pager_selector = "#schedule-pager";

        //resize to fit page size
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        })
        //resize on sidebar collapse/expand
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
            if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
                //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
                setTimeout(function() {
                    $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
                }, 0);
            }
        })
        jQuery(grid_selector).jqGrid({
            //direction: "rtl",

            //subgrid options
            subGrid : true,
            //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
            //datatype: "xml",
            subGridOptions : {
                plusicon : "ace-icon fa fa-plus center bigger-110 blue",
                minusicon  : "ace-icon fa fa-minus center bigger-110 blue",
                openicon : "ace-icon fa fa-chevron-right center orange",
                reloadOnExpand : true

            },
            subGridBeforeExpand: function(subgridDivId, rowId){
            },
            //for this example we are using local data
            subGridRowExpanded: function (subgridDivId, rowId) {
                var openedSubGrids = document.getElementsByClassName("ui-icon ace-icon fa fa-minus center bigger-110 blue");
                if(openedSubGrids.length>0) {
                    openedSubGrids[0].click();
                }
                setTimeout(function(){return;}, 500);
                var pKey=classTitle+"-"+rowId;
                var subgridTableId = subgridDivId + "_t";

                $("#" + subgridDivId).html("<table id='" + subgridTableId + "'></table>");
                $("#" + subgridTableId).jqGrid({
                    datatype: 'local',
                    data: eval(ajaxCall(pKey,"attend")),
                    colNames: ['CandidateID','FirstName','LastName', 'CheckBox'],
                    colModel: [
                        { name: 'id', width: 150 },
                        { name: 'FirstName', width: 150 },
                        { name: 'LastName', width: 150 },
                        { name: 'CheckBox', width: 150}
                    ],
                    multiselect:true,
                    multiboxonly:true


                });
                $("#" + subgridTableId).unbind();

            },


            data: grid_data,
            datatype: "local",
            height: 250,
            colNames:['Program Code','Topic','Exercises', 'Notes','Date'],
            colModel:[
                {name:'id',index:'pCode', width:40, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'topic',index:'topic', width:70, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'exercises',index:'exercises', width:140,editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'notes',index:'notes', width:140, editable: true, editoptions: {size:"20",maxlength:"30"}},
                {name:'date',index:'date', width:40, editable: true, editoptions: {size:"20",maxlength:"30"}}
            ],

            viewrecords : true,
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            altRows: true,
            //toppager: true,

            multiselect: false,
            //multikey: "ctrlKey",
            multiboxonly: true,

            loadComplete : function() {
                var table = this;
                setTimeout(function(){
                    styleCheckbox(table);

                    updateActionIcons(table);
                    updatePagerIcons(table);
                    enableTooltips(table);
                }, 0);
            },

            //editurl: "/dummy.html",//nothing is saved
            caption: "Class' Schedule"

            //,autowidth: true,



            ,

        });
        var x = document.getElementsByClassName("ui-sgcollapsed sgcollapsed");
        for(var i=0;i< x.length;i++){


            x[i].onclick = function(){
                var rowId = this.parentNode.getAttribute("id");
                var tbl = "schedule-table_"+rowId+"_t";
                getAttendances(tbl,rowId);
                var cBoxes = document.getElementsByClassName("cbox");
                for(var i=0;i< cBoxes.length;i++){
                    cBoxes[i].onchange = function(){
                        setAttendances(this.getAttribute("id"),tbl);
                    };
                }

            };
        }


        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size


        //switch element when editing inline
        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                    .addClass('ace ace-switch ace-switch-5')
                    .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                    .datepicker({format:'yyyy-mm-dd' , autoclose:true});
            }, 0);
        }


        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
            { 	//navbar options
                edit: true,
                editicon : 'ace-icon fa fa-pencil blue',
                add: true,
                addicon : 'ace-icon fa fa-plus-circle purple',
                del: true,
                delicon : 'ace-icon fa fa-trash-o red',
                search: true,
                searchicon : 'ace-icon fa fa-search orange',
                refresh: true,
                refreshicon : 'ace-icon fa fa-refresh green',
                view: true,
                viewicon : 'ace-icon fa fa-search-plus grey',
            },
            {
                //edit record form
                //closeAfterEdit: true,
                //width: 700,
                recreateForm: true,
                beforeShowForm : function(e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                }
            },
            {
                //new record form
                //width: 700,
                closeAfterAdd: true,
                recreateForm: true,
                viewPagerButtons: false,
                beforeShowForm : function(e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                        .wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                }
            },
            {
                //delete record form
                recreateForm: true,
                beforeShowForm : function(e) {
                    var form = $(e[0]);
                    if(form.data('styled')) return false;

                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_delete_form(form);

                    form.data('styled', true);
                },
                onClick : function(e) {
                    //alert(1);
                }
            },
            {
                //search form
                recreateForm: true,
                afterShowSearch: function(e){
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                    style_search_form(form);
                },
                afterRedraw: function(){
                    style_search_filters($(this));
                }
                ,
                multipleSearch: true,
                /**
                 multipleGroup:true,
                 showQuery: true
                 */
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function(e){
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                }
            }
        )



        function style_edit_form(form) {
            //enable datepicker on "sdate" field and switches for "stock" field
            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})

            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
            //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
            //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


            //update buttons classes
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
            buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

            buttons = form.next().find('.navButton a');
            buttons.find('.ui-icon').hide();
            buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
            buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
        }

        function style_delete_form(form) {
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
            buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
        }

        function style_search_filters(form) {
            form.find('.delete-rule').val('X');
            form.find('.add-rule').addClass('btn btn-xs btn-primary');
            form.find('.add-group').addClass('btn btn-xs btn-success');
            form.find('.delete-group').addClass('btn btn-xs btn-danger');
        }
        function style_search_form(form) {
            var dialog = form.closest('.ui-jqdialog');
            var buttons = dialog.find('.EditTable')
            buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
            buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
            buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
        }

        function beforeDeleteCallback(e) {
            var form = $(e[0]);
            if(form.data('styled')) return false;

            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_delete_form(form);

            form.data('styled', true);
        }

        function beforeEditCallback(e) {
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_edit_form(form);
        }



        //it causes some flicker when reloading or navigating grid
        //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
        //or go back to default browser checkbox styles for the grid
        function styleCheckbox(table) {

        }


        //unlike navButtons icons, action icons in rows seem to be hard-coded
        //you can change them like this in here if you want
        function updateActionIcons(table) {

        }

        //replace icons with FontAwesome icons like above
        function updatePagerIcons(table) {
            var replacement =
            {
                'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
                'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
                'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
                'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
            };
            $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
                var icon = $(this);
                var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

                if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
            })
        }

        function enableTooltips(table) {
            $('.navtable .ui-pg-button').tooltip({container:'body'});
            $(table).find('.ui-pg-div').tooltip({container:'body'});
        }

        //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

        $(document).one('ajaxloadstart.page', function(e) {
            $(grid_selector).jqGrid('GridUnload');
            $('.ui-jqdialog').remove();
        });
    });

    setScheduleAddButton();
    setScheduleEditButton();
    setScheduleViewButton();
    setScheduleDeleteButton();

}

function setAddModal(str){
    var spvalue = str.split("-");
    var className;
    var code;
    var year;
    if (spvalue.length==3){
        className = spvalue[0];
        code = spvalue[1];
        year = spvalue[2];
    }
    else{
        className = spvalue[0];
        code = spvalue[1];
        year = new Date().getFullYear();
    }

    document.getElementById("addSchedule_field0").value=className;
    document.getElementById("addSchedule_field1").value=code;
    document.getElementById("addSchedule_field2").value=year;

}

function setScheduleAddButton(){

    var modal = document.getElementById('addScheduleModal');
    var span = document.getElementsByClassName("close")[1];

    document.getElementById('add_schedule-table').onclick = function (){
        document.getElementById("editmodschedule-table").style.display="none";
        document.getElementById("cData").click();
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }


}

function addScheduleSubmitButton(){
    var elements = document.getElementById("addScheduleForm").elements;
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
    }

    document.forms["addScheduleForm"].action = 'readForm.php';
    document.forms["addScheduleForm"].enctype='multipart/form-data';
    document.forms["addScheduleForm"].submit();

    window.setTimeout(ScheduleFun,2000);

}

function ScheduleFun() {
    document.getElementById('addScheduleModal').style.display = "none";
    showSchedule(classTitle);
    var pcode = document.getElementById("addScheduleForm").elements[4].value;
    insertEmptyAttendances(pcode);
}

function editScheduleSubmitButton(){
    var elements = document.getElementById("editScheduleForm").elements;
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;

    }

    document.forms["editScheduleForm"].action = 'readEditForm.php';
    document.forms["editScheduleForm"].enctype='multipart/form-data';
    document.forms["editScheduleForm"].submit();
    window.setTimeout(ScheduleFun2,1000);
}
function ScheduleFun2() {
    document.getElementById('editScheduleModal').style.display = "none";
    showSchedule(classTitle);
}


function setScheduleEditButton(){

    var editModal = document.getElementById('editScheduleModal');
    var editSpan = document.getElementsByClassName("close")[2];

    document.getElementById('edit_schedule-table').onclick = function () {
        document.getElementById("editmodschedule-table").style.display = "none";
        document.getElementById("cData").click();
        editModal.style.display = "block";
        var rowID = forOnScheduleTableRows();
        ajaxFillScheduleForm(rowID);
        document.getElementById("refresh_schedule-table").click();
    }

    editSpan.onclick = function() {
        editModal.style.display = "none";
    }

}

function setScheduleViewButton(){
    var viewModal = document.getElementById('viewScheduleModal');
    var editSpan = document.getElementsByClassName("close")[3];

    document.getElementById('view_schedule-table').onclick = function (){
        document.getElementById("viewmodschedule-table").style.display="none";

        document.getElementById("cData").click();
        viewModal.style.display = "block";
        var rowID = forOnScheduleTableRows();
        ajaxViewSchedule(rowID);
        document.getElementById("refresh_schedule-table").click();

    }

    /*editSpan.onclick = function() {
        viewModal.style.display = "none";
    }*/


}

function setScheduleDeleteButton(){
    document.getElementById('del_schedule-table').onclick = function (){
        document.getElementById("delmodschedule-table").style.display="none";
        document.getElementById("eData").click();
        var rowID = forOnScheduleTableRows();
        deleteAttendances(rowID);

        var xmlhttp = null;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "deleteRecord.php?q="+classTitle+"&q2=Tschedule&q3="+rowID, false);
        xmlhttp.send();

        document.getElementById("refresh_schedule-table").click();
        showSchedule(classTitle);

        for (i=0;i<document.getElementsByClassName("tooltip fade top in").length;i++){
            document.getElementsByClassName("tooltip fade top in")[i].style.display="none";
        }
    }

}

function forOnScheduleTableRows(){
    var rowID;
    var table = document.getElementById("schedule-table");
    for (var i = 0, row; row = table.rows[i]; i++) {
        if (row.getAttribute("aria-selected")){
            rowID = row.getAttribute("id");
            return rowID;
        }
    }
    document.getElementById("refresh_schedule-table").click();
}


function ajaxFillScheduleForm(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleScheduleJSON(xmlhttp.responseText, "edit");
        }
    }


    id = String(id);
    xmlhttp.open("GET", "fillScheduleForm.php?q="+id+"&q2="+classTitle, false);
    xmlhttp.send();
}

function ajaxViewSchedule(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleScheduleJSON(xmlhttp.responseText, "view");
        }
    }

    xmlhttp.open("GET", "pullData.php?q="+classTitle+"&q2=Tschedule&q3="+id, false);
    xmlhttp.send();
}



function handleScheduleJSON(params,option){
    var json = JSON.parse(params);
    var count=0;
    var str="";
    for(var i in json){

        var key = i;
        var val = json[i];
        for(var j in val){

            var sub_key = j;
            var sub_val = val.j;
            if (option == "edit") {
                str = ("editSchedule_field" + count);
                if(document.getElementById(str).getAttribute("Type") != "file")
                    document.getElementById(str).value = json[0][sub_key];
            }
            else if(option == "view") {
                str = ("viewSchedule_field" + count);
                document.getElementById(str).innerHTML = json[0][sub_key];
            }
            else
                alert("Wrong option");

            count++;

        }

    }
    if (option == "edit") {
        setDate("editSchedule_field7", "editScheduleDay", "editScheduleMonth", "editScheduleYear");

    }
    if (option == "view"){
        var path = window.location.pathname;
        var arr = path.split("/");
        path="";
        for(var i=0;i<arr.length-1;i++){
            path+=arr[i];
            path+="/";
        }
        path+="ScheduleDocuments";
        document.getElementById(str).innerHTML = '<a href="' + path + "/" + json[0][sub_key]+'" download>Download Picture</a>';
    }


}

function insertEmptyAttendances(pcode){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    xmlhttp.open("GET", "insertAttendances.php?q="+classTitle+"&q2="+pcode, false);
    xmlhttp.send();
}

function deleteAttendances(pcode){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    xmlhttp.open("GET", "deleteAttendances.php?q="+classTitle+"&q2="+pcode, false);
    xmlhttp.send();
}

function getAttendances(tableName,pcode){
    var rowID;
    var str= "jqg_schedule-table_";
    var table = document.getElementById(tableName);
    if(table!=null) {
        for (var i = 0, row; row = table.rows[i]; i++) {
            var str = "jqg_schedule-table_";
            if (row.cells[4].getAttribute("title") == "YES") {
                rowID = row.cells[1].getAttribute("title");
                str += pcode + "_t_" + rowID;
                document.getElementById(str).checked = true;
            }
        }
    }
}


function setAttendances(id,tableName){
    var cBox = document.getElementById(id);
    if (id.charAt(id.length-1)=='t'){
        var table = document.getElementById(tableName);
        for (var i = 1, row; row = table.rows[i]; i++) {
            var str  = id.substring(2,id.length-2);
            str = "jqg" + str + "_t_" + row.getAttribute("id");
            var spText=id.split("_");
            var pCode =spText[2];
            var candidateID=row.getAttribute("id");
            var jqgBox = document.getElementById(str);
            var label = jqgBox.parentNode.parentNode.cells[4].getAttribute("title");
            if(jqgBox.checked == true && label == "NO"){
                jqgBox.parentNode.parentNode.cells[4].innerHTML = "YES";
                jqgBox.parentNode.parentNode.cells[4].setAttribute("title","YES");
                ajaxEditAttendances(pCode,candidateID,"1");

            }
            if (jqgBox.checked == false && label == "YES"){
                jqgBox.parentNode.parentNode.cells[4].innerHTML = "NO";
                jqgBox.parentNode.parentNode.cells[4].setAttribute("title","NO");
                ajaxEditAttendances(pCode,candidateID,"0");
            }

        }
    }
    else {
        var spText=id.split("_");
        var pCode =spText[2];
        var candidateID=spText[4];
        var label = cBox.parentNode.parentNode.cells[4].getAttribute("title");
        if (cBox.checked == true && label == "NO") {
            cBox.parentNode.parentNode.cells[4].innerHTML = "YES";
            cBox.parentNode.parentNode.cells[4].setAttribute("title", "YES");
            ajaxEditAttendances(pCode,candidateID,"1");
        }
        if (cBox.checked == false && label == "YES") {
            cBox.parentNode.parentNode.cells[4].innerHTML = "NO";
            cBox.parentNode.parentNode.cells[4].setAttribute("title", "NO");
            ajaxEditAttendances(pCode,candidateID,"0");
        }

    }
}

function ajaxEditAttendances(pcode,candidateID,attendance) {
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET", "editAttendances.php?q="+classTitle+"&q2="+pcode+"&q3="+candidateID+"&q4="+attendance, false);
    xmlhttp.send();

}
