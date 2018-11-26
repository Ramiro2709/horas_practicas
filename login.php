


<html lang="en">
<head>
    <?php
    session_start();
    session_destroy();

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <title>Ingreso</title>
    <style>
       html{
    height: 100%;
}

body{
    min-height: 100%;
    background-image: linear-gradient(to right top, #081e31, #1c3954, #30577a, #4577a2, #5b98cc);
    background-repeat: no-repeat;
    background-attachment: fixed;
}
        .container{
            width: 450px;height: 520px;
            top: 50%;
            left: 50%; position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 70px;
            background-color:rgba(120, 150, 177, 0.374);
            -webkit-box-shadow: 15px 13px 26px 0px rgba(0,0,0,0.5);
            /*background-color:rgba(0,0,0,0.1);*/
            }
        .indu{
            position: absolute;
            top:-70px;
            left: calc(40% - 40px);
            -webkit-filter: drop-shadow(5px 5px 5px #222);
        }
        #horas{
            padding-top: 25%;
        }
        .form-control{
            margin-bottom: 30px; -webkit-box-shadow: 3px 1px 6px 0px rgba(0,0,0,0.35);
            /*border-bottom-color: #0a355e;border-style: ;
            border-bottom-width: 3px;background-color: transparent;*/
        }
        #login{padding: 10px 45px 10px 45px;
            margin-top: 25px;
             background-color:#2a4d6d; color: #fff;-webkit-border-radius: 25px;
             left: calc(45% - 45px); position:absolute; -webkit-box-shadow: 3px 1px 6px 0px rgba(0,0,0,0.35); border-style: none;}
    </style>
</head>
<body>
        <div class="container">
                <img src="res/logo.png" class="indu" width="150" height="180">
            <form name="" action="sesion_login.php" method="POST" id="horas">
              <label>Ingrese Nombre de Usuario</label>
               <input type="text" name="usr" id="usr" class="form-control" placeholder="User" value="admin">
               <label>Contraseña</label>
               <input type="password" name="psw" id="psw" class="form-control"  placeholder="Contraseña" value="admin">
               <input type="submit" value="INGRESAR" id="login">
            <form>
        </div>
        <form action="agregar_profesor.php" method="POST">
            <button type="submit">Crear Usuario</button>
            
        </form>
</body>
</html>
