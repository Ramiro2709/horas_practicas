

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../res/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href=estilos.css>
    <script src="main.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../res/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">
    <title>Carga de Horas</title>
    <?php
session_start();
//include "bootstrap.php"
include "../funcionesHoras.php";
include "../conexion.php";
//include "../funcionesHoras.php";

if (isset($_POST["id_alumno"])) {
    $Alumno_id = $_POST["id_alumno"];
    $_SESSION["id_alumno"] = $Alumno_id;
    //echo $Alumno_id;
} else {
    $Alumno_id = $_SESSION["id_alumno"];
}
?>
    <style>
        body{
                margin:0;
                padding: 0; color: black;
                background-image: linear-gradient(to right top, #081e31, #1c3954, #30577a, #4577a2, #5b98cc);
        }
        .container{
                width: 700px;height: 550px;
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
                top:-40px;
                left: calc(50% - 60px);
                -webkit-filter: drop-shadow(5px 5px 5px #222);
                z-index: 9999;
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
        #tabla_horas{
            overflow-y: scroll;
            height: auto;
        }
        #botones{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }
        #botones button{
            height: 50px;
        }

    </style>

<body>
<header>
        <img src="logo.png" class="indu" width="120" height="150">
        <script type='text/javascript'>
        </script>

</header>

    <div class="container">
        <div id="botones">
            <form action="agregar_alumno_form.php" method="POST">
                <button type="submit" name="submit_editar">Editar</button>
            </form>
            <form action="cursos.html">
                <button type="submit">Volver</button>
            </form>

                <button type="submit" onclick="eliminar_alumno(<?php echo $Alumno_id ?>)">Eliminar alumno</button>

        </div>
<?php

$Alumno = mysql_query("SELECT nom_alumno FROM alumnos WHERE id_alumno=$Alumno_id;
    ");
$Alumno_array = mysql_fetch_array($Alumno);

echo "<div> Alumno: " . $Alumno_array[0] . "</div>";
echo "<div id='horas_totales'> Horas Totales: </div>";
echo "<div id='tabla_horas'>";
$consulta_horas = mysql_query("SELECT id_hora,fecha_hora,ing_hora,sal_hora,desc_hora,sup_hora,total_hora FROM horas WHERE alumno_hora='$Alumno_id' ORDER BY `fecha_hora` ASC");
$i = 0;
echo ("<table class='table' text-align:center>
            <thead>
            <tr>
            <th>Fecha</th>
            <th>Hora De Ingreso</th>
            <th>Hora De Salida</th>
            <th>Actividad</th>
            <th>Supervisor</th>
            <th>Horas Totales</th>
            </tr>
            </thead>
            <tbody>
            ");
$suma_total = date("H:i:s", strtotime("00:00:00"));
while ($array_consulta_horas = mysql_fetch_array($consulta_horas)) {
    $id_hora = $array_consulta_horas[0];
    echo ("<tr id='tr$id_hora'>");
    for ($i = 1; $i < 7; $i++) //
    {
        //////////////////////////
        $desc_hora = $array_consulta_horas['fecha_hora'];
        if ($array_consulta_horas[$i] == $desc_hora) //// Si es fecha le pone formato
        {
            $desc_hora = formatearFecha($desc_hora);
            echo ("<td id='$i'>$desc_hora" . "</td>");
        } else if ($array_consulta_horas[$i] == $array_consulta_horas['ing_hora'] || $array_consulta_horas[$i] == $array_consulta_horas['sal_hora'] || $array_consulta_horas[$i] == $array_consulta_horas['total_hora']) {
            $hora = $array_consulta_horas[$i];
            $hora = quitarSegundos($hora);
            echo ("<td id='$i'>$hora" . "</td>");
            //////////////////////////
        } else {
            echo ("<td id='$i'>$array_consulta_horas[$i]" . "</td>");
        }
    }

    //El boton eliminar va a la funcion Confirm() en main.js
    echo "
        <form action='cargar_horas.php' method='POST'>
            <input value='$id_hora' name='id_hora' type='text' hidden >
            <td><button type='submit' value=''> <img src='iconos/baseline-create-24px.svg' height='22' width='22' img> </td>
        </form>
        <td><button class='btn-danger' value='' name='submit_eliminar' onclick='Confirm($id_hora)'> <img src='iconos/baseline-delete-24px.svg' height='22' width='22' img></button></td>
        ";
    echo ("</tr>");
}
echo ("</table>
            </div>
            </tbdoy>");

function sumarhoras_1($Alumno_id)
{
    $horas = mysql_query("SELECT total_hora FROM horas WHERE alumno_hora='$Alumno_id'");
    $total = 0;
    while ($horas_array = mysql_fetch_array($horas)) {
        $parts = explode(":", $horas_array[0]);
        $total += $parts[2] + $parts[1] * 60 + $parts[0] * 3600;
    }
    //return gmdate("H:i:s",$total);
    $total = $total / 3600;
    return round($total * 10) / 10;
}
$lafuncio = sumarhoras($Alumno_id);
echo "
        <script type='text/javascript'>
        document.getElementById('horas_totales').innerHTML += '$lafuncio';

        </script>
        ";

?>


    </div>


</body>
</html>