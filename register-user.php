<?php

include_once "conexion.php"; 

if(isset($_POST['Registrar'])){
    
    $typeDNI = $_POST['typedni'];
    $dniuser = $_POST['dniuser'];
    $nameuser = $_POST['nameuser'];
    $surnameuser = $_POST['surnameuser'];
    $email = $_POST['emailuser'];
    $pass = md5($_POST['pass']);

    $sql = "INSERT INTO usuario(typedniuser, dniuser, nameuser, surnameuser, emailuser, passuser) VALUES ('".$typeDNI."','".$dniuser."','".$nameuser."','".$surnameuser."','".$email."','".$pass."')"; 
    $con = conectaDb(); 
    $result = $con->prepare($sql); 
    if($result->execute()){
        header('Location: index.php?x=show'); 
    }else{
        echo "<script>alert('No se pudo registrar el usuario, intente nuevamente')</script>"; 
        header('Location: index.php?x=put'); 
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine ADSO</title>
    <link rel="stylesheet" type="text/css" href="css/style-register.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <img src="img/popup.png" alt="">
            <div class="bg"></div>
            <div class="bg"></div>
            <div class="bg"></div>
            <div class="form">
                <div class="title-form">Register User</div>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div>
                       <select name="typedni" required>
                            <option value="">seleccionar tipo de identidad</option>
                            <option value="TI">TI</option>
                            <option value="CC">CC</option>
                        </select>
                    </div>
                    <div>
                        <input type="number" name="dniuser"placeholder="Ingrese su numero de documento" required>
                    </div>
                    <div>
                        <input type="text" name="nameuser" placeholder="Ingrese su nombre" required>
                    </div>
                    <div>
                        <input type="text" name="surnameuser" placeholder="Ingrese sus apellidos" required>
                    </div>
                    <div>
                        <input type="email" name="emailuser" placeholder="Ingrese Su correo eletronico" required>
                    </div>
                    <div>
                        <input type="password" name="pass" placeholder="ingrese su contraseña" required>
                    </div>
                    <div class="send">
                        <a href="index.php"><button type="button">Iniciar Sesion</button></a>
                        <button type="submit" name="Registrar">Registrar</button>
                        
                    </div>
                    <div class="send">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- Font Awesome -->
     <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>
</html>




