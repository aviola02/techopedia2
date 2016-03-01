/**
 * Created by Andreas on 3/1/2016.
 */
function getDate(){
    //take the selected day
    var day = document.getElementById("Day");
    var selectedDay = day.options[day.selectedIndex].value;
    //take the selected month
    var month = document.getElementById("Month");
    var selectedMonth = month.options[month.selectedIndex].value;
    //take the year
    var selectedYear = document.getElementById("Year").value;

    var fullDateField = document.getElementById("field8");

    var fullDate = selectedYear + "-" + selectedMonth + "-" + selectedDay;

    fullDateField.value = fullDate;

}

function setTitle() {
    var el = document.getElementById("label");
    var text = el.innerHTML;
    var sptext;
    sptext= text.split(" ");
    document.getElementById("formName").value = sptext[2];
}