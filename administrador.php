<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: index.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
        <title>Administrador</title> 
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
            <h1>Tiempo Real </h1>
            <div class="contenedor">
                <input  data-toggle="modal" data-target="#myModal1" type="submit" value="Venta de Boletos" class="button" name="enviar1">
                <?php
                    $conexion=mysqli_connect('localhost','root','','boletaje');
                    if(isset($_POST['enviar1'])){
                        //Sentencia de sql
                        $sql="SELECT SUM(boletosT1)+SUM(boletosT1) FROM ticket";
                        $result=mysqli_query($conexion,$sql);
                        
                       echo($result);
                    }
                    else{
                        '<script type="text/javascript">   
                        alert("¡Por favor complete los campos!");
                        window.location.href="registrarCajero.php";
                        </script>';
                    }
                ?>
            </div>
            <div class="contenedor">
                <input  data-toggle="modal" data-target="#myModal2" type="submit" value="Efectivo" class="button" name="enviar2">
                <?php
                    $conexion=mysqli_connect('localhost','root','','boletaje');
                    if(isset($_POST['enviar2'])){
                        //Sentencia de sql
                        $sql="SELEC * FROM retiro";
                        $result=mysqli_query($conexion,$sql);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                           <td> <?php $mostrar['id_retiro']?></td>
                           <td> <?php $mostrar['id_usuario']?></td>
                           <td> <?php $mostrar['cantidad']?></td>
                           <td> <?php $mostrar['fecha']?></td>
                            <?php
                        }
                    }
                    else{
                        '<script type="text/javascript">   
                        alert("¡Por favor complete los campos!");
                        window.location.href="registrarCajero.php";
                        </script>';
                    }
                ?>
            </div>
        </form>
        <form class="formulario">
            <h1>Finalizacion de venta</h1>
            <div class="contenedor">
                <input  type="button"  value="Venta de Boletos" class="button" name="enviar" onclick ="location.href='ventaBoletos.php';">
            </div>
            <div class="contenedor">
                <input type="button" value="Total de Asistencia" class="button" name="enviar" onclick ="location.href='totalAsistencia.php';">
            </div>
            <div class="contenedor">
                <input  data-toggle="modal" data-target="#myModal4" type="submit" value="Retiros de Efectivo" class="button" name="enviar4">
                <?php
                    $conexion=mysqli_connect('localhost','root','','boletaje');
                    if(isset($_POST['enviar4'])){
                        //Sentencia de sql
                        $sql="";
                        $result=mysqli_query($conexion,$sql);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                           <td> <?php $mostrar['']?></td>
                           <td> <?php $mostrar['']?></td>
                           <td> <?php $mostrar['']?></td>
                            <?php
                        }
                    }
                    else{
                        '<script type="text/javascript">   
                        alert("¡Por favor complete los campos!");
                        window.location.href="registrarCajero.php";
                        </script>';
                    }
                ?>
            </div>
        </form>
        <form class="formulario">
            <h1>Administrar</h1>
            <div class="contenedor">
                <input type="button" value="Agregar Cajero" class="button" name="enviar" onclick ="location.href='registrarCajero.php';"/>
            </div>
            <div class="contenedor">
                <input type="submit" value="Agregar Caja" class="button" name="enviar_">
                <?php
                    if(isset($_POST['enviar_'])){
                        //Sentencia de sql
                        $conexion=mysqli_connect('localhost','root','','boletaje');
                        $sql="INSERT INTO caja(id_caja) VALUES (NULL)";
                        $result=mysqli_query($conexion,$sql);
                        if($result){
                            '<script type="text/javascript">   
                            alert("Se ha registrado correctamente");
                            window.location.href="registrarCajero.php";
                            </script>';
                        }
                    }
                    else{
                        '<script type="text/javascript">   
                        alert("¡Por favor complete los campos!");
                        window.location.href="registrarCajero.php";
                        </script>';
                    }
                ?>
            </div>
        </form>
        <br></br><br></br>
        <footer class="footer">
            <p>Derechos Reservado 2020 ©Dynamic Systems S.A. de C.V. Ingeniería Software</p>
        </footer>

    </body>
</html>