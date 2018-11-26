<?php
session_start();
include "../conexion.php";

if(!isset($_SESSION['array_idalumnos'])){
    exit;
}

$IDalumnos = $_SESSION['array_idalumnos'];


$nombresAlumnos = [];

    foreach ($IDalumnos as $item) {
        array_push($nombresAlumnos, idANombreAlumno($item));
    }


foreach ($nombresAlumnos as $item) {
    $divAlumno = "<div class='cartasAlumnos badge badge-info btn'>$item</div>";
    echo $divAlumno;
}

function idANombreAlumno($id){
    $nombreAlumno = mysql_query("SELECT nom_alumno FROM alumnos WHERE id_alumno=$id;");
    
    $nombreAlumno = mysql_fetch_array($nombreAlumno);
    return $nombreAlumno[0];
}