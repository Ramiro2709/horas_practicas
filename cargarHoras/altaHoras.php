<?php
//lo de lucas
session_start();
include "../conexion.php";
//Hacer Post

$ing_hora = $_POST['ing_hora'];
$sal_hora = $_POST['sal_hora'];
$fecha_hora = $_POST['fecha_hora'];
$desc_hora = $_POST['desc_hora'];
$sup_hora = $_POST['sup_hora'];

//Da la diferencia de hora
$total_hora = date("H:i:s", strtotime("00:00:00") + strtotime($sal_hora) - strtotime($ing_hora));

if (isset($_POST['id_hora']))
{
    
} else{
    //// +++++ Toma la id de los alumnos
    foreach ($_SESSION["array_idalumnos"] as $key => $value) {
        $id_alumnos = $_SESSION["array_idalumnos"][$key];
        $consulta_horas = "INSERT
                INTO horas (alumno_hora,ing_hora,sal_hora,fecha_hora,desc_hora,sup_hora,total_hora)
                VALUES ('$id_alumnos','$ing_hora','$sal_hora','$fecha_hora','$desc_hora','$sup_hora','$total_hora');";
        mysql_query($consulta_horas);
    }
    echo "Listo";
    header('Location: ../cursos/cursos.html');
}
