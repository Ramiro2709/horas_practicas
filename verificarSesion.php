<?php
session_start();
include("conexion.php");

$nombreUsuario = $_SESSION['nombreUsuario'];
$contraseñaUsuario = $_SESSION['contraseñaUsuario'];

$query = "SELECT us_prof,id_prof FROM profesores WHERE us_prof = '$nombreUsuario' AND psw_prof = '$contraseñaUsuario'";


$con = mysql_query($query);
$con = mysql_fetch_array($con);

if($con[0] == $nombreUsuario){
    $_SESSION["id_profesor"] =  $con['id_prof'];
    $id = $_SESSION['id_profesor'];
    echo"
    <script type='text/javascript' id='curso1'>
        console.log('$id');
    </script>
    ";
}else{
    header("Location: login.php");
    exit();
}