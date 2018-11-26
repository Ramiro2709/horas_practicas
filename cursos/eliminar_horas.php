
<?php
include "../conexion.php";
$hora = $_POST["id_hora"];
$delete = "DELETE FROM horas WHERE id_hora='$hora'";
mysql_query($delete);
?>