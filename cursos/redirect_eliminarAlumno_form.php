<?php
session_start();
include "../conexion.php";
$idCurso = $_GET['idcurso'];

$_SESSION['idcurso'] = $idCurso;

header("Location: ./agregar_alumno_form.php");