<?php
session_start();
include "../conexion.php";
include "../funcionesHoras.php";



$id_prof=$_SESSION["id_profesor"];
$select_id_curso = mysql_query("SELECT id_curso FROM cursos WHERE prof_curso='$id_prof'",$link);


$cursos = array();

while($array_select_id_curso = mysql_fetch_array($select_id_curso)){
    array_push($cursos,$array_select_id_curso[0]);
}

$alumnos = mysql_query("SELECT nom_alumno, id_alumno FROM alumnos WHERE curso_alumno= $cursos[1]", $link);

while ($alumnosArray = mysql_fetch_array($alumnos)) {

    $nombreAlumno = $alumnosArray[0];
    $idAlumno = $alumnosArray[1];
    $horasTotales = sumarhoras($alumnosArray[1]);
    $funcion = "clicktr(this);";

    echo "
            <tr><td><input type='checkbox' class='checkboxAlumnos checkboxAlumnosSexto' id='$idAlumno'></td><td><a onclick='$funcion' id='$idAlumno'>$nombreAlumno</a></td><td>$horasTotales</td></tr>
        ";
}
