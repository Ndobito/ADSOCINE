<?php
include "conexion.php";

extract($_POST);

$conn= conectaDb();

if ($_POST['tipodc_usua']!=""){
    $var_ident = $_POST['tipodc_usua'];
    $var_ndoc = $_POST['numdc_usua'];
    $var_nombre = $_POST['nombre_usua'];
    $var_apellido = $_POST['apellido_usua'];
    $var_correo = $_POST['correo_usua'];
    // $var_fecha = $_POST['fechana_usua'];
    $var_cine = $_POST['xy'];

    $sql = $conn -> prepare("UPDATE usuario SET typedniuser=?, dniuser=?, nameuser=?, surnameuser=?, emailuser=?  WHERE iduser=?");

    $sql->bindParam(1,$var_ident);
    $sql->bindParam(2,$var_ndoc);
    $sql->bindParam(3,$var_nombre);
    $sql->bindParam(4,$var_apellido);
    $sql->bindParam(5,$var_correo);
    $sql->bindParam(6,$var_cine);


    $rta = $sql -> execute();

    if ($rta == true){ 
            
        echo"registro con exito";
        
        header('location: consultausuario.php');
        $conn= null;

    }else{
        echo "error de registro";
    }



 }else{
    echo $_POST['tipodc_usua']."lo siento uno de los campos esta vacios";
}


?>

