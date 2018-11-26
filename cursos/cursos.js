var sextoOculto = true;
var quintoOculto = true;

$(document).ready(() => {
    inicio();

    $("#checkboxTodos5to").change((e) => {
        if ($("#checkboxTodos5to").prop('checked')) {
            $(".checkboxAlumnosQuinto").each((i, element) => {
                $(element).prop('checked', true);
            });
        } else {
            $(".checkboxAlumnosQuinto").each((i, element) => {
                $(element).prop('checked', false);
            });
        }
    });

    $("#quinto_titulo").click(() => {
        quintoOculto = !quintoOculto;
        actualizarVista();
    });
    $("#sexto_titulo").click(() => {
        sextoOculto = !sextoOculto;
        actualizarVista();
    });

    $("#checkboxTodos6to").change((e) => {
        if ($("#checkboxTodos6to").prop('checked')) {
            $(".checkboxAlumnosSexto").each((i, element) => {
                $(element).prop('checked', true);
            });
        } else {
            $(".checkboxAlumnosSexto").each((i, element) => {
                $(element).prop('checked', false);
            });
        }
    });

    $("#botonAgregarHoras").click(() => {
        agregarHoras();
    });
});

function inicio() {
    $("#tablaSexto").load("cargaAlumnos6to.php");
    $("#tablaQuinto").load("cargaAlumnos5to.php");

    $("#alumnosQuinto").hide();
    $("#alumnosSexto").hide();
}

function actualizarVista() {
    if (quintoOculto) {
        $("#alumnosQuinto").stop().slideUp();
    } else {
        $("#alumnosQuinto").stop().slideDown();
    }

    if (sextoOculto) {
        $("#alumnosSexto").stop().slideUp();
    } else {
        $("#alumnosSexto").stop().slideDown();
    }
}

function clicktr(element) {
    var id = $(element).prop('id');

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", "horas.php");

    var fieldID = document.createElement("input");
    fieldID.setAttribute("type", "hidden");
    fieldID.setAttribute("name", "id_alumno");
    fieldID.setAttribute("value", id);
    

    form.appendChild(fieldID);

    document.body.appendChild(form);
    form.submit();
}

function agregarHoras() {
    var alumnosSeleccionados = getCheckedID();
    if (alumnosSeleccionados == 0) {
        alert("No seleccionó ningún alumno.");
    } else {
        var form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", "../cargarHoras/redirect_cargarHoras.php");

        var fieldID = document.createElement("input");
        fieldID.setAttribute("type", "hidden");
        fieldID.setAttribute("name", "id_alumnos");
        fieldID.setAttribute("value", alumnosSeleccionados);

        form.appendChild(fieldID);

        document.body.appendChild(form);
        form.submit();
    }
}

function getCheckedID() {
    var alumnosSeleccionados = [];
    $(".checkboxAlumnos").each((i, element) => {
        if ($(element).prop("checked")) {
            var id = $(element).prop("id");
            alumnosSeleccionados.push(id);
        }
    });
    return alumnosSeleccionados || 0;
}

function nombre_curso(){
    document.getElementById("quinto_titulo").innerHTML = curso1;
    document.getElementById("sexto_titulo").innerHTML = curso2;
    document.getElementById("nom_prof").innerHTML = nom_prof;
    document.getElementById("idcurso1").value = curso2_id;
    document.getElementById("idcurso2").value = curso1_id;
}