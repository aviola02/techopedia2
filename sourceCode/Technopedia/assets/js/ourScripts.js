/**
 * Created by PhpStorm.
 * User: hamdy
 * Date: 3/22/16
 * Time: 9:52 PM
 *
 * In this file is implemented an asynchronus connection to the back end
 * to retrieve the appropriate data using ajax technique and fits them
 * to the proper forms in order to view them as a grid. It is mainly about
 * viewing the grid table that show the students.
 *
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
            colNames:['CandidateID','First Name','Last Name','Identity Number', 'ECDL LogBook Number'],
            colModel:[{name:'candidateID',index:'candidateID', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
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


        });
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
                recreateForm: true,
                beforeShowForm : function(e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                }
            },
            {
                //new record form
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


}

function addSubmitButton(){
    var elements = document.getElementById("addForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }
    document.forms["addForm"].action = 'readForm.php';
    document.forms["addForm"].enctype='multipart/form-data';
    document.forms["addForm"].submit();
    window.setTimeout(Fun2,1000);
}

function editSubmitButton(){
    var elements = document.getElementById("editForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }
    document.forms["editForm"].action = 'readEditForm.php';
    document.forms["editForm"].enctype='multipart/form-data';
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
        for (i=0;i<document.getElementsByClassName("tooltip fade top in").length;i++){
            document.getElementsByClassName("tooltip fade top in")[i].style.display="none";
        }
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
                if(document.getElementById(str).getAttribute("Type") != "file")
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
        setDate("edit_field8","editDay","editMonth","editYear");
    if (option == "view"){
        var path = window.location.pathname;
        var arr = path.split("/");
        path="";
        for(var i=0;i<arr.length-1;i++){
            path+=arr[i];
            path+="/";
        }
        path+="StudentDocuments";
        document.getElementById(str).innerHTML = '<a href="' + path + "/" + json[0][sub_key]+'" download>Download Picture</a>';
    }

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
