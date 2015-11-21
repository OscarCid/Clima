/**
 * Created by Oscar on 03/10/2015.
 */
function actualizarIndex(url) {

    $("#success-alert").fadeTo(1000, 250).slideDown(250, function(){
        $('#success-alert').show();
    });

    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    // variable, suuestaente la traeremos desde la url donde se habra la mierda
    var value = "probando="+url;
    xmlhttp.open("POST","scr/php/datosIndex.php",true);
    //esta mierda hace mas pega
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", url.length);
    xmlhttp.setRequestHeader("Connection", "close");

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                $("#success-alert").fadeTo(1000, 250).slideUp(250, function(){
                    $('#success-alert').hide();
                });
            }
        }

    //aqui mandamos la caga pal otro lado
        xmlhttp.send(value);

}