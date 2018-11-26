<?php
session_start();
if (isset($_POST['submit_alumno']))
    {
        if ($_POST['idcurso'] != "editar")
        {
            alta_alumnos();
        } else {
            editar_alumnos();
        }
        
    }

    //++++ Carga al alumno de "agregar_alumnos.php"
    function alta_alumnos(){
        include "../conexion.php";

        $nombre_alumno = $_POST['nombre_alumno']; 
        $idcurso = $_POST['idcurso'];
        
        $insert_alumnos = "INSERT 
        INTO alumnos (nom_alumno,curso_alumno) 
        VALUES ('$nombre_alumno','$idcurso');";
        mysql_query($insert_alumnos);

        header('Location: cursos.html');

    }

    function editar_alumnos(){
        include "../conexion.php";
        $nombre_alumno = $_POST['nombre_alumno'];
        $id_alumno = $_SESSION['id_alumno'];
        $update_alumno = "UPDATE alumnos
        SET nom_alumno='$nombre_alumno'
        WHERE id_alumno='$id_alumno'         
        ;";
        mysql_query($update_alumno);
        header('Location: horas.php');
    }
?>