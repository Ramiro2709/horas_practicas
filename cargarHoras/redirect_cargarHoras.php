<?php
    session_start();

    $alumnosArray = $_POST['id_alumnos'];

    $_SESSION['array_idalumnos'] = preg_split("/,/", $alumnosArray);

    header('Location: cargarHoras.html');
?>