<?php
session_start();

$_SESSION['nombreUsuario'] = $_POST['usr'];
$_SESSION['contraseñaUsuario'] = $_POST['psw'];

include("verificarSesion.php");

header("Location: ./cursos/redirect_cursos.php");