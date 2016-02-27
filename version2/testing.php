<!DOCTYPE html>
<head>

    <script type="text/javascript">
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

                    //alert(xmlhttp.responseText);
                    //eval(xmlhttp.responseText);
                }
            }

            xmlhttp.open("GET", "viewSchedule.php?q="+str, true);
            xmlhttp.send();
        }

    </script>

</head>
<body>

<button onclick="showSchedule("EPL361-1")">try</button>

<tbody id = "tableBody">

</tbody>

</body>




</html>