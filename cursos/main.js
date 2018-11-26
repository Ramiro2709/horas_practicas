
/*
function post_cargar_alumno(){
    var post = new XMLHttpRequest();
    post.open("POST","agregar_alumno.php",true);
    document.GetElementById('horas_totales') =+ 'asd';
}
*/

/// +++ Pone 
function mod_horas_pred() {

}

/////++++ Hacer funcion ajax que recargue las horas
        
function Confirm(id_hora_input){
    var mensaje = confirm('Eliminar hora?');
    if (mensaje) {
        //alert('eliminaste');
        $.post("eliminar_horas.php",{id_hora : id_hora_input }/*,function(status){alert(status);}*/);
        var id_fila = document.getElementById("tr"+id_hora_input);
        $(id_fila).remove();
    }
    else{
        //alert('no eliminaste');
    }
}


function eliminar_alumno(id_alumno_in){
    var mensaje = confirm('Eliminar Alumno?');
    if (mensaje) {
        //alert('eliminaste');
        $.post("eliminar_alumnos.php",{id_alumno : id_alumno_in});
        window.location.replace("cursos.html");
    }
    else{
        //alert('no eliminaste');
    }
}
