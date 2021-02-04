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
                    <h1>Estatus de Taquilla</h1>
                    <div class="contenedor">
                        <font font color="" size="4" face="Courier">
                            Seleccione la taquilla que desee consultar
                        </font>
                        <div class="input-contenedor" >
                            <i class="fas fa-user icon"></i>
                            <select name="opcion1">
                                <option value=""></option>
                                <?php 
                                    $conexion=mysqli_connect('localhost','root','','boletaje');
                                    $sql="SELECT * from caja";
                                    $result=mysqli_query($conexion,$sql);

                                    while($mostrar=mysqli_fetch_array($result)){
                                    ?>
                                    <option  value="<?php echo $mostrar['id_caja'];?>"><?php echo $mostrar['id_caja'];?></option>
                                    <?php
                                    }
                                ?>  
                            </select>
                        </div>
                        <div class="contenedor">
                            <input type="submit" value="Estatus de Taquilla" class="button" name="enviar2">
                            <?php
                                $conexion=mysqli_connect('localhost','root','','boletaje');
                                if(isset($_POST['enviar2'])){  
                                    $opcion1 = $_POST['opcion1'];
                                    //Sentencia de sql
                                    $sql="SELECT * FROM ticket WHERE id_caja= 'opcion1'";
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