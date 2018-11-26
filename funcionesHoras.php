<?php
function sumarhoras($Alumno_id)
{
    $horas = mysql_query("SELECT total_hora FROM horas WHERE alumno_hora='$Alumno_id'");

    $totalHoras = 0;
    $totalMinutos = 0;
    while ($horas_array = mysql_fetch_array($horas)) {
        $parts = explode(":", $horas_array[0]);

        $totalHoras = $totalHoras + $parts[0];
        $totalMinutos = $totalMinutos + $parts[1];

    }

    $totalHoras = $totalHoras + floor($totalMinutos / 60);
    $totalMinutos = floor($totalMinutos % 60);

    $total = $totalHoras . ":" . ($totalMinutos);

    return $total;
}

function quitarSegundos($horaIn)
{
    $horaIn = explode(":", $horaIn);

    $horaRes = $horaIn[0] . ":" . $horaIn[1];

    return $horaRes;
}

function formatearFecha($fechaIn)
{
    $fechaIn = explode("-", $fechaIn);

    $año = $fechaIn[0][2] . $fechaIn[0][3];
    $mes = $fechaIn[1];
    $dia = $fechaIn[2];

    $fechaRes = $dia . "/" . $mes . "/" . $año;

    return $fechaRes;
}
