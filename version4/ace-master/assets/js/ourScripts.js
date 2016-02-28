/**
 * Created by hamdy on 2/28/16.
 */

function metisTable() {

    /*----------- BEGIN TABLESORTER CODE -------------------------*/
    /* required jquery.tablesorter.min.js*/
    //$(".sortableTable").tablesorter();
    /*----------- END TABLESORTER CODE -------------------------*/


    /*----------- BEGIN datatable CODE -------------------------*/
    table=$('#dataTables-example').DataTable({
        "sDom": "<'pull-right'l>t<'row-fluid'<'span6'f><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "Show _MENU_ entries"
        }
    });
    /*----------- END datatable CODE -------------------------*/

}
/*--------------------------------------------------------
 END TABLES.HTML SCRIPTS
 ---------------------------------------------------------*/

function synchronize() {


    table.fnDestroy();


    /*----------- BEGIN TABLESORTER CODE -------------------------*/
    /* required jquery.tablesorter.min.js*/
    $(".sortableTable").tablesorter();
    /*----------- END TABLESORTER CODE -------------------------*/


    /*----------- BEGIN datatable CODE -------------------------*/
    table=$('#dataTable').dataTable({
        "sDom": "<'pull-right'l>t<'row-fluid'<'span6'f><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "Show _MENU_ entries"
        }
    });

}

function cleanDataTable() {
//    table.cleanData();

    if (table.fnSettings().aoData.length !== 0) {


        try{
            table.fnClearTable().fnDraw();
        } catch (err){
            return;
        }
    }

}

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

            var kati = xmlhttp.responseText;
            document.getElementById(tableBody).innerHTML = kati;

        }
    }

    if (category=="schedule"){
        xmlhttp.open("GET", "viewSchedule.php?q="+str, false);
    } else if (category=="students"){
        xmlhttp.open("GET", "viewStudent.php?q="+str, false);
    } else if (category=="staff"){
        xmlhttp.open("GET", "viewStaff.php?q="+str, false);
    }

    xmlhttp.send();

    //table.fnDestroy();
}


function showSchedule(str){

    cleanDataTable();
    ajaxCall(str,"schedule","tableBody");
    synchronize();
}

function showStudents(str){

    cleanDataTable();
    ajaxCall(str,"students","studentsTable");
    synchronize();

}

function showStaff(str){

    cleanDataTable1();
    ajaxCall(str,"staff","staffTable");
    synchronize2();

}


function synchronize2() {

    table1.fnDestroy();


    /*----------- BEGIN TABLESORTER CODE -------------------------*/
    /* required jquery.tablesorter.min.js*/
    $(".sortableTable").tablesorter();
    /*----------- END TABLESORTER CODE -------------------------*/


    /*----------- BEGIN datatable CODE -------------------------*/
    table1=$('#dataTable2').dataTable({
        "sDom": "<'pull-right'l>t<'row-fluid'<'span6'f><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "Show _MENU_ entries"
        }
    });
    /*----------- END datatable CODE -------------------------*/

    /*----------- BEGIN action table CODE -------------------------*/
    $('#actionTable2 button.remove').on('click', function() {
        $(this).closest('tr').remove();
    });
    $('#actionTable2 button.edit').on('click', function() {
        $('#editModal').modal({
            show: true
        });
        var val1 = $(this).closest('tr').children('td').eq(1),
            val2 = $(this).closest('tr').children('td').eq(2),
            val3 = $(this).closest('tr').children('td').eq(3);
        $('#editModal #fName').val(val1.html());
        $('#editModal #lName').val(val2.html());
        $('#editModal #uName').val(val3.html());


        $('#editModal #sbmtBtn').on('click', function() {
            val1.html($('#editModal #fName').val());
            val2.html($('#editModal #lName').val());
            val3.html($('#editModal #uName').val());
        });

    });
    /*----------- END action table CODE -------------------------*/

}

function cleanDataTable1() {
    //table1.cleanData();

    if (table1.fnSettings().aoData.length !== 0) {


        try{
            table1.fnClearTable().fnDraw();
        } catch (err){
            return;
        }
    }

}


function metisTable1() {

    /*----------- BEGIN TABLESORTER CODE -------------------------*/
    /* required jquery.tablesorter.min.js*/
    $(".sortableTable").tablesorter();
    /*----------- END TABLESORTER CODE -------------------------*/


    /*----------- BEGIN datatable CODE -------------------------*/
    table1=$('#dataTable2').dataTable({
        "sDom": "<'pull-right'l>t<'row-fluid'<'span6'f><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "Show _MENU_ entries"
        }
    });
    /*----------- END datatable CODE -------------------------*/

    /*----------- BEGIN action table CODE -------------------------*/
    $('#actionTable2 button.remove').on('click', function() {
        $(this).closest('tr').remove();
    });
    $('#actionTable2 button.edit').on('click', function() {
        $('#editModal').modal({
            show: true
        });
        var val1 = $(this).closest('tr').children('td').eq(1),
            val2 = $(this).closest('tr').children('td').eq(2),
            val3 = $(this).closest('tr').children('td').eq(3);
        $('#editModal #fName').val(val1.html());
        $('#editModal #lName').val(val2.html());
        $('#editModal #uName').val(val3.html());


        $('#editModal #sbmtBtn').on('click', function() {
            val1.html($('#editModal #fName').val());
            val2.html($('#editModal #lName').val());
            val3.html($('#editModal #uName').val());
        });

    });
    /*----------- END action table CODE -------------------------*/


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