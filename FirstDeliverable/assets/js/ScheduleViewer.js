///**
// * Created by hamdy on 3/11/16.
// */

var classTitle;

function showSchedule(str){
    classTitle=str;
    setAddModal(str);
    $("#grid-table").jqGrid('GridUnload');
    $("#subgridTable").jqGrid('GridUnload');
    var grid_data= eval(ajaxCall(str,"schedule"));

    var subgrid_data=eval(ajaxCall(str,"attend"));


    //var subgrid_data = eval();
    jQuery(function($) {

        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

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

        //if your grid is inside another element, for example a tab pane, you should use its parent's width:
        /**
         $(window).on('resize.jqGrid', function () {
					var parent_width = $(grid_selector).closest('.tab-pane').width();
					$(grid_selector).jqGrid( 'setGridWidth', parent_width );
				})
         //and also set width when tab pane becomes visible
         $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				  if($(e.target).attr('href') == '#mygrid') {
					var parent_width = $(grid_selector).closest('.tab-pane').width();
					$(grid_selector).jqGrid( 'setGridWidth', parent_width );
				  }
				})
         */





        jQuery(grid_selector).jqGrid({
            //direction: "rtl",

            //subgrid options
            subGrid : true,
            //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
            //datatype: "xml",
            subGridOptions : {
                plusicon : "ace-icon fa fa-plus center bigger-110 blue",
                minusicon  : "ace-icon fa fa-minus center bigger-110 blue",
                openicon : "ace-icon fa fa-chevron-right center orange"
            },
            //for this example we are using local data
            subGridRowExpanded: function (subgridDivId, rowId) {
                var subgridTableId = subgridDivId + "_t";
                $("#" + subgridDivId).html("<table id='" + subgridTableId + "'></table>");
                $("#" + subgridTableId).jqGrid({
                    datatype: 'local',
                    data: subgrid_data,
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
            },

            data: grid_data,
            datatype: "local",
            height: 250,
            colNames:[' ', 'Program Code','Topic','Exercises', 'Notes'],
            colModel:[
                {name:'myac',index:'', width:80, fixed:true, sortable:false, resize:false,
                    formatter:'actions',
                    formatoptions:{
                        keys:true,
                        delbutton: false,//disable delete button
                        //delOptions:{recreateForm: false},
                        //editformbutton:false, editOptions:{recreateForm: false}
                    }
                },
                {name:'id',index:'pCode', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'topic',index:'topic', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'exercises',index:'exercises', width:150,editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'notes',index:'notes', width:150, editable: true, editoptions: {size:"20",maxlength:"30"}}
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
            // grouping:true,
            //groupingView : {
            //		 groupField : ['topic'],
            //		 groupDataSorted : true,
            //		 plusicon : 'fa fa-chevron-down bigger-110',
            //		 minusicon : 'fa fa-chevron-up bigger-110'
            //	},
            //caption: "Grouping"


        });
        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size



        //enable search/filter toolbar
        //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
        //jQuery(grid_selector).filterToolbar({});


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
            /**
             $(table).find('input:checkbox').addClass('ace')
             .wrap('<label />')
             .after('<span class="lbl align-top" />')


             $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
             .find('input.cbox[type=checkbox]').addClass('ace')
             .wrap('<label />').after('<span class="lbl align-top" />');
             */
        }


        //unlike navButtons icons, action icons in rows seem to be hard-coded
        //you can change them like this in here if you want
        function updateActionIcons(table) {
            /**
             var replacement =
             {
                 'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
                 'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
                 'ui-icon-disk' : 'ace-icon fa fa-check green',
                 'ui-icon-cancel' : 'ace-icon fa fa-times red'
             };
             $(table).find('.ui-pg-div span.ui-icon').each(function(){
						var icon = $(this);
						var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
						if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
					})
             */
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

    document.getElementById('add_grid-table').onclick = function (){
        document.getElementById("editmodgrid-table").style.display="none";
        document.getElementById("cData").click();
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

}


function addScheduleSubmitButton(){
    var elements = document.getElementById("addScheduleForm").elements;
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
    }

    document.forms["addScheduleForm"].action = 'readForm.php';
    document.forms["addScheduleForm"].submit();
    window.setTimeout(ScheduleFun,2000);
}

function ScheduleFun() {
    document.getElementById('addScheduleModal').style.display = "none";
    showSchedule(classTitle);
}

function editScheduleSubmitButton(){
    var elements = document.getElementById("editScheduleForm").elements;
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;

    }

    document.forms["editScheduleForm"].action = 'readEditForm.php';
    document.forms["editScheduleForm"].submit();
    window.setTimeout(ScheduleFun2,1000);
}
function ScheduleFun2() {
    document.getElementById('editScheduleModal').style.display = "none";
    showStaff("Staff");
}


function setScheduleEditButton(){

    var editModal = document.getElementById('editScheduleModal');
    var editSpan = document.getElementsByClassName("close")[2];

    document.getElementById('edit_grid-table').onclick = function () {
        document.getElementById("editmodgrid-table").style.display = "none";
        document.getElementById("cData").click();
        editModal.style.display = "block";
        var rowID = forOnScheduleTableRows();
        ajaxFillScheduleForm(rowID);
        document.getElementById("refresh_grid-table").click();
    }

    editSpan.onclick = function() {
        editModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

}

function setScheduleViewButton(){
    var viewModal = document.getElementById('viewScheduleModal');
    var editSpan = document.getElementsByClassName("close")[3];

    document.getElementById('view_grid-table').onclick = function (){
        document.getElementById("viewmodgrid-table").style.display="none";

        document.getElementById("cData").click();
        viewModal.style.display = "block";
        var rowID = forOnScheduleTableRows();
        ajaxViewSchedule(rowID);
        document.getElementById("refresh_grid-table").click();

    }

    editSpan.onclick = function() {
        viewModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == viewModal) {
            viewModal.style.display = "none";
        }
    }
}

function setScheduleDeleteButton(){
    document.getElementById('del_grid-table').onclick = function (){
        document.getElementById("delmodgrid-table").style.display="none";
        document.getElementById("eData").click();
        var rowID = forOnScheduleTableRows();


        var xmlhttp = null;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "deleteRecord.php?q="+classTitle+"&q2=Tschedule&q3="+rowID, false);
        xmlhttp.send();

        document.getElementById("refresh_grid-table").click();
        showSchedule(classTitle);

    }

}

function forOnScheduleTableRows(){
    var rowID;
    var table = document.getElementById("grid-table");
    for (var i = 0, row; row = table.rows[i]; i++) {
        if (row.getAttribute("aria-selected")){
            rowID = row.getAttribute("id");
            return rowID;
        }
    }
    document.getElementById("refresh_grid-table").click();
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


}


