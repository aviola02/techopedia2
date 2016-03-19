/**
 * Created by Andreas on 3/1/2016.
 */
function getDate(d,m,y,dest){
    //take the selected day
    var day = document.getElementById(d);
    var selectedDay = day.options[day.selectedIndex].value;
    //take the selected month
    var month = document.getElementById(m);
    var selectedMonth = month.options[month.selectedIndex].value;
    //take the year
    var selectedYear = document.getElementById(y).value;

    var fullDateField = document.getElementById(dest);

    var fullDate = selectedYear + "-" + selectedMonth + "-" + selectedDay;

    fullDateField.value = fullDate;

}

function getDateForEdit(){
    //take the selected day
    var day = document.getElementById("editDay");
    var selectedDay = day.options[day.selectedIndex].value;
    //take the selected month
    var month = document.getElementById("editMonth");
    var selectedMonth = month.options[month.selectedIndex].value;
    //take the year
    var selectedYear = document.getElementById("editYear").value;

    var fullDateField = document.getElementById("edit_field8");

    var fullDate = selectedYear + "-" + selectedMonth + "-" + selectedDay;

    fullDateField.value = fullDate;

}



function setDate(){
    var fullDateField = document.getElementById("edit_field8").value;
    var sptext= fullDateField.split("-");
    var year = sptext[0];
    var month = sptext[1];
    var day = sptext[2];
    document.getElementById("editDay").value = day;
    document.getElementById("editMonth").value = month;
    document.getElementById("editYear").value = year;
}

<<<<<<< HEAD
function setTitle(label,dest) {
    var el = document.getElementById(label);
    var text = el.innerHTML;
    var sptext;
    sptext= text.split(" ");
    document.getElementById(dest).value = sptext[2];
    //document.getElementById("editFormName").value = sptext[2];
=======
function setTitle() {
    var el = document.getElementById("label");
    var text = el.innerHTML;
    var sptext;
    sptext= text.split(" ");
    document.getElementById("formName").value = sptext[2];
    document.getElementById("editFormName").value = sptext[2];
>>>>>>> 16ac76dc582df28e5c4358223e3a7e3f07968021
}