<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title></title> 
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="Style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>  
    <body>
        <div class="wrapper">
            <header>
                <form class="formulario" action="#" method="POST">
                    <h1>Venta de Boletos</h1>
                    <div class="contenedor">
                        <font font color="" size="4" face="Courier">
                            &nbsp;&nbsp;Seleccione el evento
                            <br></br>
                        </font>
                        <div class="input-contenedor" >
                            <i class="fas fa-user icon"></i>
                            <select name="opcion2">
                                <option value=""></option>
                                <?php 
                                    $conexion=mysqli_connect('localhost','root','','boletaje');
                                    $sql="SELECT nombreEvento from evento";
                                    $result=mysqli_query($conexion,$sql);

                                    while($mostrar=mysqli_fetch_array($result)){
                                    ?>
                                    <option  value="<?php echo $mostrar['nombreEvento'];?>"><?php echo $mostrar['nombreEvento'];?></option>
                                <?php
                                }
                                ?>  
                            </select>
                        </div>
                        <div class="contenedor">
                            <input  data-toggle="modal" data-target="#myModal5" type="submit" value="Total de Asistencia" class="button" name="enviar5">
                            <?php
                                $conexion=mysqli_connect('localhost','root','','boletaje');
                                if(isset($_POST['enviar5'])){
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
                            <p><a class="link" href="administradorDeCaja.php">Regresar</a></p>
                        </div>
                    </div>
                </form>
            </header>
        </div>
        <table>
            <br></br><br></br><br></br>
        </table>
        <footer class="footer">
            <p>Derechos Reservado 2020 ©Dynamic Systems S.A. de C.V. Ingeniería Software</p>
        </footer>
    </body>
</html>