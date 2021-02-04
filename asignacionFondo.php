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
        <div class="wrapper"><br></br>
            <header>
                <form class="formulario" action="#" method="POST">
                    <h1>Asignar Fondos</h1>
                    <div class="contenedor">
                        <div class="input-contenedor">
                            <i class="fas fa-user icon"></i>
                            <input type="text" placeholder="Cantidad" name="cantidad">
                        </div>
                        <input type="submit" value="Asignar" class="button" name="enviar">
                        <?php
                            $conexion=mysqli_connect('localhost','root','','boletaje');

                            if(isset($_POST['enviar'])){
                                //recuperar variables
                                $cantidad = $_POST['cantidad'];
                                //Sentencia de sql
                                $sql="INSERT INTO fondo (id_fondo,cantidad) VALUES (NULL,'$cantidad')";
                                $result=mysqli_query($conexion,$sql);
                                if($result){
                                    '<script type="text/javascript">   
                                    alert("Se ha asignado correctamente");
                                    window.location.href="registrarCajero.php";
                                    </script>';
                                }
                                $sql="INSERT INTO fondo (id_fondo,cantidad) VALUES (NULL,'$cantidad')";
                                $result=mysqli_query($conexion,$sql);
                            }
                            else{
                                '<script type="text/javascript">   
                                alert("¡Por favor complete los campos!");
                                window.location.href="registrarCajero.php";
                                </script>';
                            }
                        ?>
                        <br></br>
                        <p><a class="link" href="administrador.php">Regresar</a></p>
                    </div>
                 </form>
            </header>
        </div>
        <table>
            <br></br><br></br><br></br><br></br><br></br>
        </table>
        <footer class="footer">
            <p>Derechos Reservado 2020 ©Dynamic Systems S.A. de C.V. Ingeniería Software</p>
        </footer>
    </body>
</html>