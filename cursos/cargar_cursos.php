<?php
    session_start();
    include "../conexion.php";
    //$_SESSION["id_profesor"] = "3"; //////////////Sacar despues
    $id_prof=$_SESSION["id_profesor"];
    $select_curso = mysql_query("SELECT nombre_curso FROM cursos WHERE prof_curso='$id_prof'",$link);


    $select_id_curso = mysql_query("SELECT id_curso FROM cursos WHERE prof_curso='$id_prof'",$link);

    $select_nom_prof = mysql_query("SELECT nom_prof FROM profesores WHERE id_prof='$id_prof'",$link);
    $array_select_nom_prof = mysql_fetch_array($select_nom_prof);
    //echo $array_select_nom_prof[0];

    //$array_select_curso = mysql_fetch_array($select_curso);
    
    //$array_select_curso = mysql_fetch_array($select_curso);
    $cursos = array();
    while($array_select_curso = mysql_fetch_array($select_curso)){
        array_push($cursos,$array_select_curso[0]);
    }

    $cursos_id = array();
    while($array_select_id_curso = mysql_fetch_array($select_id_curso)){
        array_push($cursos_id,$array_select_id_curso[0]);
    }

    echo "
    <script type='text/javascript' id='curso1'>
        var curso1 = '$cursos[0]';
        var curso2 = '$cursos[1]';
        console.log(curso1);

        var curso1_id = '$cursos_id[1]';
        var curso2_id = '$cursos_id[0]';

        var nom_prof = '$array_select_nom_prof[0]';
        nombre_curso();
    </script>
    ";

?>