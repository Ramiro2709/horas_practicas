<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="cursos.css">
    <title>Alta-Prof</title>
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
        #submit_user {
        margin: 15px;
        background-color:lightblue;
        }
        .container {
            text-align: center;
        }
        #error {
            visibility: hidden;
        }
    }

    </style>
</head>
<?php
    session_start();
    if(isset($_POST['submit_prof']))
        {
            alta_prof();
        }

        function alta_prof(){
            include "conexion.php";
        
            $prof_name = $_POST['nom_prof'];
            $prof_user = $_POST['us_prof'];
            $prof_pass = $_POST['psw_prof'];
            $prof_conf = $_POST['conf_prof'];
            $cur1_prof = $_POST['cur1_prof'];
            $cur2_prof = $_POST['cur2_prof'];

            if ($prof_pass == $prof_conf)
            {
                $insert_prof= "INSERT INTO profesores (nom_prof,us_prof,psw_prof) VALUES ('$prof_name', '$prof_user', '$prof_pass')";
                mysql_query($insert_prof);

                $select_prof = mysql_query("SELECT id_prof FROM profesores WHERE us_prof='$prof_user'",$link);
                $array_select_prof = mysql_fetch_array($select_prof);

                ////////////Cambiar por algo bien echo
                $insert_cursos = "INSERT INTO cursos (nombre_curso,prof_curso) VALUES ('$cur1_prof', '$array_select_prof[0]')";
                mysql_query($insert_cursos);
                $insert_cursos2 = "INSERT INTO cursos (nombre_curso,prof_curso) VALUES ('$cur2_prof', '$array_select_prof[0]')";
                mysql_query($insert_cursos2);

                $_SESSION["id_profesor"]=$array_select_prof[0] ;
                header('Location: cursos/cursos.html');
            }
            else{
                echo "
                <script type='text/javascript'>
                    alert('Las contraseñas deben coincidir');
                    //document.getElementById('error').style.visibility = 'block';
                </script>
                ";
            }
            
            
        }
?>
<body>
<div class="container">
<header>
    <img src="logo.png" class="indu" width="120" height="150"> 
</header>
<form action="agregar_profesor.php" method="POST" onsubmit="alta_prof()">
    <p>Nombre del profesor: <input type="text" name="nom_prof"/></p>
    <p>Nombre de Usuario: <input name="us_prof" value=""></p>
    <p>Contraseña: <input type="password" name="psw_prof" value=""></p>
    <p>Repetir Contraseña: <input type="password" value="" name="conf_prof"></p>
    <p>Curso 1: <input type="text" value="" name="cur1_prof"></p>
    <p>Curso 2: <input type="text" value="" name="cur2_prof"></p>
    <p><input type="submit" value="Cargar Usuario" name="submit_prof" id="submit_user"></p>
    <p id="error">Las contraseñas deben coincidir</p>
</div>
</form>
</body>
</html>