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
    <style>
        

    </style>
</head>

<body>
<div class="container">
        
<header>
  <img src="logo.png" class="indu" width="120" height="150"> 
</header>

<?php
session_start();
error_reporting (0);
include "../conexion.php";
//include "bootstrap.php";

if (isset($_POST['submit_volver']))
{
  header('Location: horas.php'); 
}

/// +++++ Modificacion de horas
///+++++ Toma datos de un id de hora y ponerlos como valor en el cargar_horas
if (isset($_POST['id_hora'])) // Se si clickeo en "Modificar" en horas.php
{
  $id_hora = $_POST['id_hora'];
  $query_id_hora = mysql_query("SELECT * FROM horas WHERE id_hora='$id_hora'",$link);
  $array_id_hora = mysql_fetch_array($query_id_hora);
  $date = $array_id_hora['fecha_hora'];
  $Alumno_id = $array_id_hora['alumno_hora'];
  // 1ramiro
  $_SESSION["id_alumno"]=$Alumno_id ;

  $nom_submit = "submit_modificar_horas";
} else {
  $date = date("Y-m-d");
  $nom_submit = "submit_alta_horas";
}

/// +++ Alta o modificacion de las horas, se llama desde el formulario
function alta_horas() 
{
  session_start();
  include "conexion.php";

  //+++ Recibe los datos del formulario
  $alumno_hora = $_POST['id_alumno'];
  $ing_hora = $_POST['ing_hora'];
  $sal_hora = $_POST['sal_hora'];
  $fecha_hora = $_POST['fecha_hora'];
  $desc_hora = $_POST['desc_hora'];
  $sup_hora = $_POST['sup_hora'];
    
  //Da la diferencia de hora
  $total_hora = date("H:i:s", strtotime ("00:00:00") + strtotime($sal_hora) - strtotime($ing_hora));

/// +++++ Modificacion de horas
  if (isset($_POST['submit_modificar_horas']) ) /// ++++++ Si es para modificar
            { 
              $id_hora = $_POST['id_hora_up'];
              //$_SESSION["prueba"] = "ID de la hora: ".$id_hora;
              $consulta_horas = "UPDATE horas 
              SET fecha_hora='$fecha_hora',ing_hora='$ing_hora',sal_hora='$sal_hora',desc_hora='$desc_hora',sup_hora='$sup_hora',total_hora='$total_hora'
              WHERE id_hora='$id_hora'         
              ;";
              mysql_query($consulta_horas);

              $Alumno = mysql_query("SELECT alumno_hora FROM horas WHERE id_hora=$id_hora;");
              $Alumno_array = mysql_fetch_array($Alumno);
              $_SESSION["id_alumno"] = $Alumno_array[0];
              header('Location: horas.php');  
            } 
/// +++++ Alta de los alumnos por checkbox
  else if (isset($_POST['submit_alta_horas'])) 
            {
                //$_SESSION["prueba"] = "Entro a Alta";
                foreach ($_SESSION["array_idalumnos"] as $key => $value)   //// +++++ Toma la id de los alumnos ; 
                {
                  if ($value != "submit"){
                    $id_alumnos = $_SESSION["array_idalumnos"][$key];
                    //$_SESSION["prueba"] += $id_alumnos;
                    $consulta_horas = "INSERT 
                    INTO horas (alumno_hora,ing_hora,sal_hora,fecha_hora,desc_hora,sup_hora,total_hora) 
                    VALUES ('$id_alumnos','$ing_hora','$sal_hora','$fecha_hora','$desc_hora','$sup_hora','$total_hora');";
                    mysql_query($consulta_horas);
                    header('Location: formulario.php');  
                  }        
                }
            }
  //header('Location: formulario.php');  
} // Fin alta_horas()

//Invocacionde alta_horas()
if(isset($_POST['submit_alta_horas']) || isset($_POST['submit_modificar_horas']) )
      {
        alta_horas();
      }

///+++ Recibe los Alumnos de los checkbox
if(isset($_POST['submit_check']))
      { 
        $array_idalumnos = array();
        foreach ($_POST as $key => $id_alumnos) {
        if ($id_alumnos != "submit_check") /////+++++ Agrega todo el POST al array de ids excepto el submit
          {
            $array_idalumnos[] = $id_alumnos;
          } 
        }
        $_SESSION["array_idalumnos"]= $array_idalumnos; ///+++ Id de los alumnos para la alta
        echo "<p>Alumnos a los que se le agregaran horas:  </p>";
        foreach ($_POST as $key => $value) {
          if ($key != "submit_check")
          {
            echo $key." ; "; //Valor del form
          } 
        }
      }
?>

<form action="cargar_horas.php" method="POST" name="form1" id="form1" onsubmit="alta_horas()">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hora de Ingreso:</td>
      <td><input type="time" name="ing_hora" value="<?php echo $array_id_hora['ing_hora']; ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hora de Salida:</td>
      <td><input type="time" name="sal_hora" value="<?php echo $array_id_hora['sal_hora']; ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha:</td>
      <td><input type="date" name="fecha_hora" value="<?php echo $date; ?>" id="fecha" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Descripcion:</td>
      <td><input type="text" name="desc_hora" value="<?php echo $array_id_hora['desc_hora']; ?>" size="50"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Supervisor:</td>
      <td><input type="text" name="sup_hora" value="<?php echo $array_id_hora['sup_hora']; ?>" size="50"/></td> <!-- Poner profesor de predeterminado -->
    </tr>
    <input type="text" name="id_alumno" value="<?php echo $Alumno_id; ?>" size="50" hidden/>
    <input type="text" name="id_hora_up" value="<?php echo $id_hora; ?>" size="50" hidden/>

    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Cargar hora" name='<?php echo $nom_submit; ?>' class="btn btn-info"/></td>
      <!-- 1ramiro -->
      <form action="cargar_horas.php">
        <td><input type="submit" value="Cancelar" name="submit_volver" /></td>
      </form>
      <!-- -->
    </tr>
  </table>
</form>    
</div>    
</body>
</html>