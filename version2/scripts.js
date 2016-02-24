/**
 * Created by Andreas on 2/13/2016.
 */
function setTitle() {
    var el = document.getElementById("label");
    var text = el.innerHTML;
    var sptext;
    sptext= text.split(" ");
    document.getElementById("formName").value = sptext[2];
}

function wrongLogin(){
    alert("in");
    document.getElementById("Username").clearAttributes();
    document.getElementById("Password").clearAttributes();
    document.getElementById("msgBox").style.display = "clock";
}

//ajax for view Schedule
function showSchedule(str){
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("tableBody").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "viewSchedule.php?q="+str, true);
    xmlhttp.send();
}
