/**
 * Created by hamdy on 3/11/16.
 *
 *
 * This file is responsible to set the view of the data related to the
 * staff. It is also the class that arranges all the appearance for the
 * data related with the Staff.
 *
 *
 */

function showStaff(str){


    var staff_data= eval(ajaxCall(str,"staff","staffTable"));
    $("#staff-table").jqGrid('GridUnload');
    jQuery(function($) {
        var grid_selector2 = "#staff-table";
        var pager_selector2 = "#staff-pager";

        //resize to fit page size
        $(window).on('resize.jqGrid', function () {
            $(grid_selector2).jqGrid( 'setGridWidth', $(".page-content").width() );
        })
        //resize on sidebar collapse/expand
        var parent_column = $(grid_selector2).closest('[class*="col-"]');
        $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
            if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
                //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
                setTimeout(function() {
                    $(grid_selector2).jqGrid( 'setGridWidth', parent_column.width() );
                }, 0);
            }
        })






        jQuery(grid_selector2).jqGrid({

            data: staff_data,
            datatype: "local",
            height: 250,
            colNames:['First Name','Last Name','User Name','Mobile Phone Number', 'E-mail'],
            colModel:[

                {name:'fName',index:'fName', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'lName',index:'lName', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'id',index:'id', width:150, editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'Phone',index:'Phone', width:150,editable: true, editoptions:{size:"20",maxlength:"30"}},
                {name:'email',index:'email', width:150, editable: true, editoptions: {size:"20",maxlength:"30"}}
            ],

            viewrecords : true,
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector2,
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
            caption: "Staff"

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
        jQuery(grid_selector2).jqGrid('navGrid',pager_selector2,
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
                onClick :
                    function(e) {
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

        $(document).one('ajaxloadstart.page', function(e) {
            $(grid_selector2).jqGrid('GridUnload');
            $('.ui-jqdialog').remove();
        });
    });

    setStaffAddButton();
    setStaffEditButton("staff");
    setStaffViewButton();
    setStaffDeleteButton();



}

function setStaffAddButton(){

    var modal = document.getElementById('addStaffModal');
    var span = document.getElementsByClassName("close")[3];

    document.getElementById('add_staff-table').onclick = function (){
        document.getElementById("editmodstaff-table").style.display="none";
        document.getElementById("cData").click();
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }


}


function addStaffSubmitButton(){
    var elements = document.getElementById("addStaffForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }

    document.forms["addStaffForm"].action = 'readForm.php';
    document.forms["addStaffForm"].enctype='multipart/form-data';
    document.forms["addStaffForm"].submit();
    window.setTimeout(StaffFun,1000);
}

function StaffFun() {
    document.getElementById('addStaffModal').style.display = "none";
    showStaff("Staff");
}

function editStaffSubmitButton(){
    var elements = document.getElementById("editStaffForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }

    document.forms["editStaffForm"].action = 'readEditForm.php';
    document.forms["editStaffForm"].enctype='multipart/form-data';
    document.forms["editStaffForm"].submit();
    window.setTimeout(StaffFun2,1000);
}
function StaffFun2() {
    document.getElementById('editStaffModal').style.display = "none";
    showStaff("Staff");
}

function editStaffSubmitButton2(){
    var choice = confirm("Are you sure that you want to change your personal information?");
    if (choice == false)
        return;

    var elements = document.getElementById("editProfileForm").elements;
    var patt = new RegExp("[^ @]*@[^ @]*");
    for (var i = 0, element; element = elements[i++];) {
        if (element.type === "text" && element.required==true && element.value == "")
            return;
        else if(element.pattern=="[^ @]*@[^ @]*" && element.value != "" && patt.test(element.value)==false)
            return;
    }

    document.forms["editProfileForm"].action = 'readEditForm.php';
    document.forms["editProfileForm"].enctype='multipart/form-data';
    document.forms["editProfileForm"].submit();
    window.setTimeout(StaffFun3,1000);
}
function StaffFun3() {
    document.getElementById('profileModal').style.display = "none";
}

function setStaffEditButton(typeOfEdit){

    if (typeOfEdit=="staff"){

        var editModal = document.getElementById('editStaffModal');
        var editSpan = document.getElementsByClassName("close")[4];



        document.getElementById('edit_staff-table').onclick = function (){
            document.getElementById("editmodstaff-table").style.display="none";
            document.getElementById("cData").click();
            editModal.style.display = "block";
            var rowID = forOnStaffTableRows();
            ajaxFillStaffForm(rowID);
            document.getElementById("refresh_staff-table").click();
        }

    } else if (typeOfEdit=="profile") {

        var editModal = document.getElementById('profileModal');

        editModal.style.display = "block";
        var username = document.getElementById('profileUsername').innerText;
        ajaxFillProfileForm(username);

        var passField = document.getElementById("edit_Profilefield1");
        passFieldValue = passField.value;
        passField.onchange = function(){
            var choice = confirm("Are you sure you want to change password?");
            if (choice == false) {
                passField.value = passFieldValue;
                return;
            }
        }

    }else if (typeOfEdit=="password") {

        var editModal = document.getElementById('passwordModal');
        editModal.style.display = "block";
        var username = document.getElementById('passwordUsername').innerText;
        document.getElementById("userName").value = username;



    }



    editSpan.onclick = function() {
        editModal.style.display = "none";
    }



}

function setStaffViewButton(){
    var viewModal = document.getElementById('myStaffViewModal');
    var editSpan = document.getElementsByClassName("close")[5];

    document.getElementById('view_staff-table').onclick = function (){
        document.getElementById("viewmodstaff-table").style.display="none";

        document.getElementById("cData").click();
        viewModal.style.display = "block";
        var rowID = forOnStaffTableRows();
        ajaxViewStaff(rowID);
        document.getElementById("refresh_staff-table").click();

    }

    editSpan.onclick = function() {
        viewModal.style.display = "none";
    }


}

function setStaffDeleteButton(){
    document.getElementById('del_staff-table').onclick = function (){
        document.getElementById("delmodstaff-table").style.display="none";
        document.getElementById("eData").click();
        var rowID = forOnStaffTableRows();


        var xmlhttp = null;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "deleteRecord.php?q="+rowID+"&q2=Staff", false);
        xmlhttp.send();

        document.getElementById("refresh_staff-table").click();
        showStaff("Staff");

        for (i=0;i<document.getElementsByClassName("tooltip fade top in").length;i++){
            document.getElementsByClassName("tooltip fade top in")[i].style.display="none";
        }
    }

}

function forOnStaffTableRows(){
    var rowID;
    var table = document.getElementById("staff-table");
    for (var i = 0, row; row = table.rows[i]; i++) {
        if (row.getAttribute("aria-selected")){
            rowID = row.getAttribute("id");
            return rowID;
        }
    }
    document.getElementById("refresh_staff-table").click();
}


function ajaxFillStaffForm(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleStaffJSON(xmlhttp.responseText, "edit");
        }
    }


    id = String(id);
    xmlhttp.open("GET", "fillStaffForm.php?q="+id, false);
    xmlhttp.send();
}

function ajaxFillProfileForm(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleStaffJSON(xmlhttp.responseText, "editProfile");
        }
    }


    id = String(id);
    xmlhttp.open("GET", "fillStaffForm.php?q="+id, false);
    xmlhttp.send();
}

function ajaxViewStaff(id){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            handleStaffJSON(xmlhttp.responseText, "view");
        }
    }

    xmlhttp.open("GET", "pullData.php?q="+id+"&q2=Staff", false);
    xmlhttp.send();
}



function handleStaffJSON(params,option){
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
                str = ("edit_stafffield" + count);
                if(document.getElementById(str).getAttribute("Type") != "file")
                    document.getElementById(str).value = json[0][sub_key];
            }
            else if(option == "view") {
                str = ("viewStaff_field" + count);
                document.getElementById(str).innerHTML = json[0][sub_key];
            }
            else if(option == "editProfile") {
                str = ("edit_Profilefield" + count);
                    document.getElementById(str).value = json[0][sub_key];
            }
            else
                alert("Wrong option");

            count++;

        }

    }
    if (option == "edit") {
        setDate("edit_stafffield4", "editStaffDay", "editStaffMonth", "editStaffYear");
        setDate("edit_stafffield7", "editStaffDay2", "editStaffMonth2", "editStaffYear2");
        textBoxToSelectBox("edit_stafffield11","editType");
    }
    if (option == "editProfile") {
        setDate("edit_Profilefield4", "editProfileDay", "editProfileMonth", "editProfileYear");
        setDate("edit_Profilefield7", "editProfileDay2", "editProfileMonth2", "editProfileYear2");
        textBoxToSelectBox("edit_Profilefield11","editProfileType");
    }
    if (option == "view"){
        var path = window.location.pathname;
        var arr = path.split("/");
        path="";
        for(var i=0;i<arr.length-1;i++){
            path+=arr[i];
            path+="/";
        }
        path+="StaffPictures";
        document.getElementById(str).innerHTML = '<a href="' + path + "/" + json[0][sub_key]+'" download>Download Picture</a>';
    }


}


