/**
 * Created by hamdy on 2/28/16.
 */

function ajaxCall(str,category,tableBody){


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
    }

    xmlhttp.send();
    return xmlhttp.onreadystatechange();
    //table.fnDestroy();
}



function showStudents(str){

    var grid_data= eval(ajaxCall(str,"students","studentsTable"));
    $("#grid-table").jqGrid('GridUnload');
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

        jQuery(grid_selector).jqGrid({



            data: grid_data,
            datatype: "local",
            height: 250,
            colNames:['','First Name','Last Name','Identity Number', 'ECDL LogBook Number'],
            colModel:[{},
                {name:'fName',index:'fName', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'lName',index:'lName', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'id',index:'id', width:150,editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'ecdlNum',index:'ecdlNum', width:150, editable: true, editoptions: {size:"20",maxlength:"30"}}
            ],

            viewrecords : true,
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            altRows: true,
            //toppager: true,

            multiselect: false,
            //multikey: "ctrlKey",
            multiboxonly: false,

            loadComplete : function() {
                var table = this;
                setTimeout(function(){
                    styleCheckbox(table);

                    updateActionIcons(table);
                    updatePagerIcons(table);
                    enableTooltips(table);
                }, 0);
            },

            editurl: "/dummy.html",//nothing is saved
            caption: "Students"

            //,autowidth: true,


            /**
             ,
             grouping:true,
             groupingView : {
						 groupField : ['name'],
						 groupDataSorted : true,
						 plusicon : 'fa fa-chevron-down bigger-110',
						 minusicon : 'fa fa-chevron-up bigger-110'
					},
             caption: "Grouping"
             */

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
            //style_edit_form(form);
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

    setAddButton();
    setEditButton();
    setViewButton();
    setDeleteButton();

}

function setAddButton(){

    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];

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

function addSubmitButton(){
    document.forms["addForm"].action = 'readForm.php';
    document.forms["addForm"].submit();
    window.setTimeout(Fun2,1000);
}

function editSubmitButton(){
    document.forms["editForm"].action = 'readEditForm.php';
    document.forms["editForm"].submit();
    window.setTimeout(Fun,1000);
}
function Fun() {
    document.getElementById('myEditModal').style.display = "none";
    showStudents("Student");
}

function Fun2() {
    document.getElementById('myModal').style.display = "none";
    showStudents("Student");
}

function setEditButton(){

    var editModal = document.getElementById('myEditModal');
    var editSpan = document.getElementsByClassName("close")[1];

    document.getElementById('edit_grid-table').onclick = function (){
        document.getElementById("editmodgrid-table").style.display="none";
        document.getElementById("cData").click();
        editModal.style.display = "block";
        var rowID = forOnTableRows();
        ajaxFillForm(rowID);
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

function setViewButton(){

    var viewModal = document.getElementById('myViewModal');
    var editSpan = document.getElementsByClassName("close")[2];

    document.getElementById('view_grid-table').onclick = function (){
        document.getElementById("viewmodgrid-table").style.display="none";
        document.getElementById("cData").click();
        viewModal.style.display = "block";
        var rowID = forOnTableRows();
        ajaxViewStudent(rowID);
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

function setDeleteButton(){

    document.getElementById('del_grid-table').onclick = function (){
        document.getElementById("delmodgrid-table").style.display="none";
        document.getElementById("eData").click();
        var rowID = forOnTableRows();

        var xmlhttp = null;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "deleteRecord.php?q="+rowID+"&q2=Student", false);
        xmlhttp.send();

        document.getElementById("refresh_grid-table").click();
        showStudents("Student");
    }

}

function forOnTableRows(){
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


function ajaxFillForm(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleJSON(xmlhttp.responseText, "edit");
        }
    }

    xmlhttp.open("GET", "fillStudentForm.php?q="+id, false);
    xmlhttp.send();
}

function ajaxViewStudent(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleJSON(xmlhttp.responseText, "view");
        }
    }

    xmlhttp.open("GET", "pullData.php?q="+id+"&q2=Student", false);
    xmlhttp.send();
}



function handleJSON(params,option){
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
                str = ("edit_field" + count);
                document.getElementById(str).value = json[0][sub_key];
            }
        else if(option == "view") {
                str = ("view_field" + count);
                document.getElementById(str).innerHTML = json[0][sub_key];
            }
            else
                alert("Wrong option");

            count++;

        }

    }
    if (option == "edit")
        setDate();

}
//function showStaff(str){
//
//    //ajaxCall(str,"staff","staffTable");
//
//    var staff_data= eval(ajaxCall(str,"staff","staffTable"));
//
//    jQuery(function($) {
//        var grid_selector = "#staff-table";
//        var pager_selector = "#staff-pager";
//
//        //resize to fit page size
//        $(window).on('resize.jqGrid', function () {
//            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
//        })
//        //resize on sidebar collapse/expand
//        var parent_column = $(grid_selector).closest('[class*="col-"]');
//        $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
//            if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
//                //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
//                setTimeout(function() {
//                    $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
//                }, 0);
//            }
//        })
//
//        //if your grid is inside another element, for example a tab pane, you should use its parent's width:
//        /**
//         $(window).on('resize.jqGrid', function () {
//					var parent_width = $(grid_selector).closest('.tab-pane').width();
//					$(grid_selector).jqGrid( 'setGridWidth', parent_width );
//				})
//         //and also set width when tab pane becomes visible
//         $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//				  if($(e.target).attr('href') == '#mygrid') {
//					var parent_width = $(grid_selector).closest('.tab-pane').width();
//					$(grid_selector).jqGrid( 'setGridWidth', parent_width );
//				  }
//				})
//         */
//
//
//
//
//
//        jQuery(grid_selector).jqGrid({
//            //direction: "rtl",
//
//            //subgrid options
//            subGrid : false,
//            //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
//            //datatype: "xml",
//            subGridOptions : {
//                plusicon : "ace-icon fa fa-plus center bigger-110 blue",
//                minusicon  : "ace-icon fa fa-minus center bigger-110 blue",
//                openicon : "ace-icon fa fa-chevron-right center orange"
//            },
//            //for this example we are using local data
//            subGridRowExpanded: function (subgridDivId, rowId) {
//                var subgridTableId = subgridDivId + "_t";
//                $("#" + subgridDivId).html("<table id='" + subgridTableId + "'></table>");
//                $("#" + subgridTableId).jqGrid({
//                    datatype: 'local',
//                    data: subgrid_data,
//                    colNames: ['No','Item Name','Qty'],
//                    colModel: [
//                        { name: 'id', width: 50 },
//                        { name: 'name', width: 150 },
//                        { name: 'qty', width: 50 }
//                    ]
//                });
//            },
//
//
//
//            data: staff_data,
//            datatype: "local",
//            height: 250,
//            colNames:[' ', 'First Name','Last Name','Mobile Phone Number', 'E-mail'],
//            colModel:[
//                {name:'myac',index:'', width:80, fixed:true, sortable:false, resize:false,
//                    formatter:'actions',
//                    formatoptions:{
//                        keys:true,
//                        //delbutton: false,//disable delete button
//
//                        delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
//                        //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
//                    }
//                },
//                {name:'fName',index:'fName', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
//                {name:'lName',index:'lName', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
//                {name:'Phone',index:'Phone', width:150,editable: true, editoptions:{size:"20",maxlength:"30"}},
//                {name:'email',index:'email', width:150, editable: true, editoptions: {size:"20",maxlength:"30"}}
//            ],
//
//            viewrecords : true,
//            rowNum:10,
//            rowList:[10,20,30],
//            pager : pager_selector,
//            altRows: true,
//            //toppager: true,
//
//            multiselect: true,
//            //multikey: "ctrlKey",
//            multiboxonly: true,
//
//            loadComplete : function() {
//                var table = this;
//                setTimeout(function(){
//                    styleCheckbox(table);
//
//                    updateActionIcons(table);
//                    updatePagerIcons(table);
//                    enableTooltips(table);
//                }, 0);
//            },
//
//            editurl: "/dummy.html",//nothing is saved
//            caption: "Staff"
//
//            //,autowidth: true,
//
//
//            /**
//             ,
//             grouping:true,
//             groupingView : {
//						 groupField : ['name'],
//						 groupDataSorted : true,
//						 plusicon : 'fa fa-chevron-down bigger-110',
//						 minusicon : 'fa fa-chevron-up bigger-110'
//					},
//             caption: "Grouping"
//             */
//
//        });
//        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size
//
//
//
//        //enable search/filter toolbar
//        //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
//        //jQuery(grid_selector).filterToolbar({});
//
//
//        //switch element when editing inline
//        function aceSwitch( cellvalue, options, cell ) {
//            setTimeout(function(){
//                $(cell) .find('input[type=checkbox]')
//                    .addClass('ace ace-switch ace-switch-5')
//                    .after('<span class="lbl"></span>');
//            }, 0);
//        }
//        //enable datepicker
//        function pickDate( cellvalue, options, cell ) {
//            setTimeout(function(){
//                $(cell) .find('input[type=text]')
//                    .datepicker({format:'yyyy-mm-dd' , autoclose:true});
//            }, 0);
//        }
//
//
//        //navButtons
//        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
//            { 	//navbar options
//                edit: true,
//                editicon : 'ace-icon fa fa-pencil blue',
//                add: true,
//                addicon : 'ace-icon fa fa-plus-circle purple',
//                del: true,
//                delicon : 'ace-icon fa fa-trash-o red',
//                search: true,
//                searchicon : 'ace-icon fa fa-search orange',
//                refresh: true,
//                refreshicon : 'ace-icon fa fa-refresh green',
//                view: true,
//                viewicon : 'ace-icon fa fa-search-plus grey',
//            },
//            {
//                //edit record form
//                //closeAfterEdit: true,
//                //width: 700,
//                recreateForm: true,
//                beforeShowForm : function(e) {
//                    var form = $(e[0]);
//                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
//                    //style_edit_form(form);
//                    //showModal();
//                }
//            },
//            {
//                //new record form
//                //width: 700,
//                closeAfterAdd: true,
//                recreateForm: true,
//                viewPagerButtons: false,
//                beforeShowForm : function(e) {
//                    var form = $(e[0]);
//                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
//                        .wrapInner('<div class="widget-header" />')
//                    //style_edit_form(form);
//                    showModal();
//                }
//            },
//            {
//                //delete record form
//                recreateForm: true,
//                beforeShowForm : function(e) {
//                    var form = $(e[0]);
//                    if(form.data('styled')) return false;
//
//                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
//                    style_delete_form(form);
//
//                    form.data('styled', true);
//                },
//                onClick :
//                    function(e) {
//                //    alert(1);
//                }
//            },
//            {
//                //search form
//                recreateForm: true,
//                afterShowSearch: function(e){
//                    var form = $(e[0]);
//                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
//                    style_search_form(form);
//                },
//                afterRedraw: function(){
//                    style_search_filters($(this));
//                }
//                ,
//                multipleSearch: true,
//                /**
//                 multipleGroup:true,
//                 showQuery: true
//                 */
//            },
//            {
//                //view record form
//                recreateForm: true,
//                beforeShowForm: function(e){
//                    var form = $(e[0]);
//                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
//                }
//            }
//        )
//
//
//
//        function style_edit_form(form) {
//            //enable datepicker on "sdate" field and switches for "stock" field
//            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
//
//            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
//            //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
//            //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');
//
//
//            //update buttons classes
//            var buttons = form.next().find('.EditButton .fm-button');
//            buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
//            buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
//            buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
//
//            buttons = form.next().find('.navButton a');
//            buttons.find('.ui-icon').hide();
//            buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
//            buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
//        }
//
//        function style_delete_form(form) {
//            var buttons = form.next().find('.EditButton .fm-button');
//            buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
//            buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
//            buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
//        }
//
//        function style_search_filters(form) {
//            form.find('.delete-rule').val('X');
//            form.find('.add-rule').addClass('btn btn-xs btn-primary');
//            form.find('.add-group').addClass('btn btn-xs btn-success');
//            form.find('.delete-group').addClass('btn btn-xs btn-danger');
//        }
//        function style_search_form(form) {
//            var dialog = form.closest('.ui-jqdialog');
//            var buttons = dialog.find('.EditTable')
//            buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
//            buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
//            buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
//        }
//
//        function beforeDeleteCallback(e) {
//            var form = $(e[0]);
//            if(form.data('styled')) return false;
//
//            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
//            style_delete_form(form);
//
//            form.data('styled', true);
//        }
//
//        function beforeEditCallback(e) {
//            var form = $(e[0]);
//            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
//            //style_edit_form(form);
//            showModal();
//        }
//
//
//
//        //it causes some flicker when reloading or navigating grid
//        //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
//        //or go back to default browser checkbox styles for the grid
//        function styleCheckbox(table) {
//            /**
//             $(table).find('input:checkbox').addClass('ace')
//             .wrap('<label />')
//             .after('<span class="lbl align-top" />')
//
//
//             $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
//             .find('input.cbox[type=checkbox]').addClass('ace')
//             .wrap('<label />').after('<span class="lbl align-top" />');
//             */
//        }
//
//
//        //unlike navButtons icons, action icons in rows seem to be hard-coded
//        //you can change them like this in here if you want
//        function updateActionIcons(table) {
//            /**
//             var replacement =
//             {
//                 'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
//                 'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
//                 'ui-icon-disk' : 'ace-icon fa fa-check green',
//                 'ui-icon-cancel' : 'ace-icon fa fa-times red'
//             };
//             $(table).find('.ui-pg-div span.ui-icon').each(function(){
//						var icon = $(this);
//						var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
//						if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
//					})
//             */
//        }
//
//        //replace icons with FontAwesome icons like above
//        function updatePagerIcons(table) {
//            var replacement =
//            {
//                'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
//                'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
//                'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
//                'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
//            };
//            $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
//                var icon = $(this);
//                var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
//
//                if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
//            })
//        }
//
//        function enableTooltips(table) {
//            $('.navtable .ui-pg-button').tooltip({container:'body'});
//            $(table).find('.ui-pg-div').tooltip({container:'body'});
//        }
//
//        //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
//
//        $(document).one('ajaxloadstart.page', function(e) {
//            $(grid_selector).jqGrid('GridUnload');
//            $('.ui-jqdialog').remove();
//        });
//    });
//
//    kati();
//
//}

    function kati(){
        document.getElementById('add_staff-table').onclick = function (){ alert('Add');}

        document.getElementById('edit_staff-table').onclick = function (){ alert('Edit');}
        //document.getElementById('TblGrid_staff-table').load.onclick = function (){ document.getElementById('TblGrid_staff-table').append('<tr id="haha" class="FormData" rowpos="5"></tr>');}

    }

function ajaxAttendances(str){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("attendancesDataTable").innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET", "viewAttendances.php?q="+str, false);
    xmlhttp.send();
}

function showTimetable(){


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
                copiedEventObject.
                if($extraEventClass)
                copiedEventObject['className'] = [$extraEventClass];

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


//			console.log(calEvent.id);
//			console.log(jsEvent);
//			console.log(view);
//
//			 change the border color just for fun
//			$(this).css('border-color', 'red');

            }

        });


    })



}

function showModal(){

// Get the modal
    var modal = document.getElementById('myModal');


// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];



// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


}
