var today = new Date();

function asignar_fecha(){
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    //today = dd + '/' +  mm + '/' + yyyy;
    today = yyyy + '-' +  mm + '-' + dd;

    //document.write(today);
    document.getElementById("fecha_hora").val = today;
    alert(document.getElementById('fecha_hora').val);
}


$(document).ready(function () {
    $("#alumnosContainer").load("mostrarAlumnos.php");

    $("#fecha_hora").val(today);

    //alert("prueba");
});

document.getElementById(error).style.visibility(block);