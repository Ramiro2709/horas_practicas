
<?php
session_start();
include "../conexion.php";

$id_alumno = $_POST["id_alumno"];
$delete = "DELETE FROM alumnos WHERE id_alumno='$id_alumno'";
mysql_query($delete);
header("Location: cursos.html");
?>