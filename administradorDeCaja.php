<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: index.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
        <title>Administrador de Taquilla</title> 
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="Style.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>  
    <body class="Fondo1">
        <header>
            <div class="main">
                <div>
                    <nav>
                        <ul>
                            <li>
                                <a href="https://localhost/programas/Proyecto%20Ingenieria%20de%20Software?cerrar_sesion=1">Cerrar sesion</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <nav>
                        <ul>
                            <li>
                                <a href="index.php">Configuración</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <h1>
                        <font font color="#fff" size="5" face="Courier">
                            &nbsp; Sistema de Boletaje para eventos de la Facultad de Ingeniería 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </font>
                    </h1>              
                </div>
            </div> 
        </header>        
        <form class="formulario">
            <h1>Administrar</h1>
            <br></br>
            <div class="contenedor">
                <input type="button" value="Corte de caja" class="button" name="enviar"onclick ="location.href='corteCaja.php';">
            </div>
            <div class="contenedor">
                <input type="button" value="Estatus de Taquilla" class="button" name="enviar" onclick ="location.href='estatusTaquilla.php';">
            </div>
            <div class="contenedor">
                <input type="button" value="Asignar Fondos" class="button" name="enviar" onclick ="location.href='asignacionFondo.php';"/>
            </div>
        </form>
        <br></br><br></br><br></br>
        <footer class="footer">
            <p>Derechos Reservado 2020 ©Dynamic Systems S.A. de C.V. Ingeniería Software</p>
        </footer>
    </body>
</html>