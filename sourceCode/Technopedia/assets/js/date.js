/**
 * Created by Andreas on 3/1/2016.
 *
 * This file is responsible to handle manage correct display of
 * dates and other fields. It is also responsible to set some
 * combo boxes according to dynamic data from the data base.
 *
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



function setDate(date,s,m,y){
    var fullDateField = document.getElementById(date).value;
    var sptext= fullDateField.split("-");
    var year = sptext[0];
    var month = sptext[1];
    var day = sptext[2];
    document.getElementById(s).value = day;
    document.getElementById(m).value = month;
    document.getElementById(y).value = year;
}

function setTitle(label,dest) {
    var el = document.getElementById(label);
    var text = el.innerHTML;
    var sptext;
    sptext= text.split(" ");
    document.getElementById(dest).value = sptext[2];
    //document.getElementById("editFormName").value = sptext[2];
}

function selectBoxToTextBox(combo,text){
    var cb = document.getElementById(combo);
    var cb_value = cb.options[cb.selectedIndex].text;

    var dest = document.getElementById(text);
    dest.value = cb_value;
}

function textBoxToSelectBox(text, combo){
    var text_value = document.getElementById(text).value;
    var cb = document.getElementById(combo);
    if (text_value == "Admin")
        cb.selectedIndex = "0";
    else if (text_value == "Secretary")
        cb.selectedIndex = "1";
    else if (text_value == "Teacher")
        cb.selectedIndex = "2";

}
function classSelectBoxToTextBox(combo,text){
    var cb = document.getElementById(combo);
    var cb_value = cb.options[cb.selectedIndex].text;

    var dest = document.getElementById(text);
    if (cb_value=="Current Class")
        dest.value = "1";
    else
        dest.value = "0";
}

function CurrentOldClass(text, combo){
    var text_value = document.getElementById(text).value;
    var cb = document.getElementById(combo);
    if (text_value == "1")
        cb.selectedIndex = "0";
    else if (text_value == "0")
        cb.selectedIndex = "1";
}