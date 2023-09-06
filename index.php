<?php

include_once "conexion.php"; 

if(isset($_POST['Inicio'])){
    if(empty($_POST['email']) || empty($_POST['pass'])){
        header("Location: index.php?x=vacio"); 
    } else{
        $user = $_POST['email']; 
        $pass = md5($_POST['pass']); 

        $con = conectaDb(); 
        $sql = "SELECT iduser FROM usuario WHERE emailuser='".$user."' AND passuser='".$pass."'"; 
        $result = $con->prepare($sql); 
        $result->execute(); 
        $data = $result->fetch();  
        if($data){
            session_start(); 
            $_SESSION['usuario'] = $data; 
            var_dump($_SESSION['usuario']); 
            header('Location: panelPrincipal.php'); 
        }else{
            header('Location: index.php?x=credential'); 
        }

    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine ADSO</title>
    <link rel="stylesheet" type="text/css" href="css/style-index.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <img src="img/popup.png" alt="">
            <div class="bg"></div>
            <div class="bg"></div>
            <div class="bg"></div>
            <div class="title">
                <p>CINE</p>
                <p>ADSO</p>
            </div>
            <div class="form">
                <div class="title-form">Log In</div>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Direccion de Correo Electronico">
                    </div>
                    <div>
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="pass" placeholder="Contraseña">
                    </div>
                    <div class="send">
                        <a href="register-user.php"><button type="button">Registrarse</button></a>
                        <button type="submit" name="Inicio">Seguir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Alerta de registro -->
    <?php
        
        if(isset($_REQUEST['x'])){
            switch ($_REQUEST['x']) {
                case 'show':
                    echo "
                    <script>
                        alert('Usuario registrado con éxito');
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 1000);
                    </script>"; 
                    break;
                case 'credential': 
                    echo "
                        <script>
                            alert('Usuario y/o contraseña incorrectos');
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 1000);
                        </script>"; 
                    break; 
                case 'vacio': 
                    echo "
                        <script>
                            alert('Complete todos los campos');
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 1000);
                        </script>"; 
                    break; 
                case 'exit': 
                    echo "
                        <script>
                            alert('Sesión cerrada correctamente');
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 1000);
                        </script>"; 
                    break; 
                default:
                    echo "
                        <script>
                            alert('Error al registrar el usuario, intente nuevamente');
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 1000);
                        </script>"; 
                    break;
            }
        }
    ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>
</html>



<!-- <!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cine ADSO</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src='main.js'></script>
    <br><title class="ini" ><h2>Iniciar sesión</h2></title>
</head>

<body class = "inicio">

   <div class = "contenedor">
    
   <br> <img src="img/images.jpg">   

    <h2>Iniciar sesión</h2><br>
    <form action="loginuser.php" method="post">
        <input name="usuario" type="text" placeholder="ingresar correo"><br>
        <input name="contrasena" type=password placeholder="ingresar contraseña"><br>
        <button type="submit">Iniciar sesión</button><br>
    </form><br/>

    <a href="registrosClientes.php">Registrarse</a>

   </div> 
    
</body>
</html> -->




