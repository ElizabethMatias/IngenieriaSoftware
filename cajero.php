<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: index.php');
        }
    }
    $conexion=mysqli_connect('localhost','root','','boletaje');

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Cajero</title> 
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
       
            <form class="formulario" action="#" method="POST">
                <h1>Venta de Boletos</h1>

                    <font font color="" size="4" face="Courier">
                        &nbsp;&nbsp;Taquilla
                        <br></br>
                    </font>

                    <div class="input-contenedor" >
                        <i class="fas fa-user icon"></i>
                        <select name="opcion1">
                            <option value=""></option>
                            <?php 
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

                    <font font color="" size="4" face="Courier">
                        &nbsp;&nbsp;Evento
                        <br></br>
                    </font>

                    <div class="input-contenedor" >
                        <i class="fas fa-user icon"></i>
                        <select name="opcion2">
                            <option value=""></option>
                            <?php 
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

                    <font font color="" size="4" face="Courier">
                        &nbsp;&nbsp;Cajero
                        <br></br>
                    </font>

                    <div class="input-contenedor" >
                        <i class="fas fa-user icon"></i>
                        <select name="opcion3">
                            <option value=""></option>
                            <?php 
                                $sql="SELECT name from usuarios where rol_id=1";
                                $result=mysqli_query($conexion,$sql);

                                while($mostrar=mysqli_fetch_array($result)){
                                ?>
                                <option  value="<?php echo $mostrar['name'];?>"><?php echo $mostrar['name'];?></option>
                            <?php
                            }
                            ?>  
                        </select>
                    </div>

                    <font font color="" size="4" face="Courier">
                        &nbsp;&nbsp;Cantidad de boletos de $20
                        <br></br>
                    </font>

                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <select name="opcion4">
                            <option value=""></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <font font color="" size="4" face="Courier">
                        &nbsp;&nbsp;Cantidad de boletos de $15
                        <br></br>
                    </font>

                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>  
                        <select name="opcion5"> 
                            <option value=""></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="text" placeholder="Numero de Cuenta del cliente" name="NumeroCuenta">
                    </div>
                    <input type="submit" value="Comprar" class="button" name="enviarC">
                    <?php
                        $conexion=mysqli_connect('localhost','root','','boletaje');

                        if(isset($_POST['enviarC'])){
                            //recuperar variables
                            $opcion1 = $_POST['opcion1'];
                            $opcion2 = $_POST['opcion2'];
                            $opcion3 = $_POST['opcion3'];
                            $opcion4 = $_POST['opcion4'];
                            $opcion5 = $_POST['opcion5'];
                            $NumeroCuenta = $_POST['NumeroCuenta'];

                            //Sentencia de sql
                            $sql="INSERT INTO ticket (id_ticket,evento,cliente,id_caja,id_usuario,boletosT1,boletosT2,fechaCompra,total) 
                                VALUES (NULL,'$opcion2','$NumeroCuenta','$opcion1','$opcion3','$opcion4','$opcion5',datatime,'($opcion4*20)+($opcion5*15))";
                            $result=mysqli_query($conexion,$sql);
                            if($result){
                                '<script type="text/javascript">   
                                alert("Se ha registrado correctamente");
                                window.location.href="rcajero.php";
                                </script>';
                                $sql1="SELECT * FROM ticket where evento='$opcion2' and cliente_id='$NumeroCuenta' and id_caja='$opcion1'and id_usuario='$opcion3'";
                                $resultado=$mysqli->query($consulta);
                                
                                $pdf=new PDF();
                                $pdf->AliasNbPages();
                                $pdf->AddPage();
                                $pdf->SetFont('Arial','',16);

                                while($row=$resultado->fetch_assoc()){
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                    $pdf->Cell(10,10,$row[''],1,0,'C',0);
                                }
                                $pdf->Output();
                            }
                            else{
                                '<script type="text/javascript">   
                                    alert("¡Por favor complete los campos!");
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
                    <br></br>
                </div>
            </form>
        <br></br><br></br>
        <footer class="footer">
            <p>Derechos Reservado 2020 ©Dynamic Systems S.A. de C.V. Ingeniería Software</p>
        </footer>
    </body>
</html>