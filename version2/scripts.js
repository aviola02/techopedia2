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
    document.getElementById("Username").clearAttributes();
    document.getElementById("Password").clearAttributes();
    document.getElementById("msgBox").style.display = "clock";
}