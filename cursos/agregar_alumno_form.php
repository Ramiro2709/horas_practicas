

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Carga de Horas</title>
    <style>
        body{
                margin:0;
                padding: 0; color: black;
                background-image: linear-gradient(to right top, #081e31, #1c3954, #30577a, #4577a2, #5b98cc);
        }
        .container{
                width: 600px;height: 550px;
                top: 50%;
                left: 50%; position: absolute;
                transform: translate(-50%,-50%);
                box-sizing: border-box;
                padding-top: 90px;
                -webkit-box-shadow: 15px 13px 26px 0px rgba(0,0,0,0.5);
                background-color:rgba(255, 255, 255, 0.925);
        }
        .indu{
                position: absolute;
                top:-80px;
                left: calc(50% - 60px);
                -webkit-filter: drop-shadow(5px 5px 5px #222);
        }
        #quinto{
            padding: 10px 45px 10px 45px; left: 3%;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            width: 45%;
            margin-top: 5px;
            background-color:#2a4d6d; color: #fff;-webkit-border-radius: 25px;
            position:absolute; -webkit-box-shadow: 3px 1px 6px 0px rgba(0,0,0,0.35); border-style: none;
        }
        #sexto{
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            left: 53%; width: 45%;
            padding: 10px 45px 10px 45px;
            margin-top: 5px;
            background-color:#2a4d6d; color: #fff;-webkit-border-radius: 25px;
            position:absolute; -webkit-box-shadow: 3px 1px 6px 0px rgba(0,0,0,0.35); border-style: none;
        }
        .agregar {
        margin: 15px;
        background-color:lightblue;
        }
        .container {
            text-align: center;
        }
    }

    </style>
<?php
session_start();
//include "comprobarSesion.php";
include "../conexion.php";

$idcurso = $_SESSION['idcurso']; // Recibir desde cursos.html;
$nom_curso = mysql_query("SELECT nombre_curso FROM cursos WHERE id_curso='$idcurso'", $link);
$nom_curso_array = mysql_fetch_array($nom_curso);

if (isset($_POST['submit_editar'])) {
    $idcurso = "editar";
}
?>

</head>
<body>



    <div class="container">
        <header>
            <img src="logo.png" class="indu" width="120" height="150">
        </header>
        <?php
echo "Nombre del curso: " . $nom_curso_array[0];
?>
        <form action="agregar_alumno_insert.php" method="POST">
            Nombre y Apellido del Alumno:
            <input type="text" name="nombre_alumno"/>
            <input name="idcurso" hidden value="<?php echo $idcurso; ?>">
            <input type="submit" value="Cargar Alumno" name="submit_alumno" class="btn btn-info">
        </form>
    </div>
</body>
</html>