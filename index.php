<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location:cajero.php');
            break;
            case 2:
                header('location:administradorDeCaja.php');
            break;
            case 3:
                header('location:administrador.php');
            break;
            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[4];

            $_SESSION['rol']=$rol;
                switch($rol){
                    case 1:
                        header('location:cajero.php');
                    break;
                    case 2:
                        header('location:administradorDeCaja.php');
                    break;
                    case 3:
                        header('location:administrador.php');
                    break;
                    default:
                }
        }else{
            //no existe
            echo '<script type="text/javascript">   
            alert("El usuario o contraseña son incorrectos");
            window.location.href="index.php";
            </script>';
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="Style.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>  
    <body>
        <div class="Fondo">
            <font color="#993366" size="10" face="Courier">
                <br></br>
                <h1> Sistema</h1>
                <h1> de Boletaje</h1>
                <h1> para Eventos</h1>
                <br></br><br></br>
            </font>
        </div>
        <table>
            <br></br>
        </table>
        <div class="wrapper">
            <form class="formulario" action='#' method="POST">
                <h1>Login</h1>
                <div class="contenedor">
                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Correo Electronico" name="username">
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="password" placeholder="Contraseña" name="password">
                    </div>
                    <input type="submit" value="Iniciar sesion" class="button">
                    <p>¿No tienes una cuenta? <a class="link" href="registrarvista.php">Registrate </a></p>
                </div>
            </form>
        </div>
        <table>
            <br></br><br></br><br></br><br></br>
        </table>
        <footer class="footer">
            <p>Derechos Reservado 2020 ©Dynamic Systems S.A. de C.V. Ingeniería Software</p>
        </footer>
        <nav class="navbar-wrapper navbar-inverse navbar-fixed-bottom">
            <div class="container-fluid">
                <p class="navbar-text pull-right">Hecho en México, todos los derechos reservados &copy; 2020 by Ing. Guadalupe Cruz Mendoza</p>
            </div>
        </nav>
    </body>
</html>