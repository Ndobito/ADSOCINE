
<?php
include "conexion.php";

$conn=conectaDb();

$var_indicator = $_REQUEST['x'];

$sql= $conn -> prepare("DELETE FROM usuario WHERE iduser=?");
$sql -> bindParam(1, $var_indicator);
$sql -> execute();

$rta =$sql ->rowCount();

if($rta > 0){
    header('location: consultausuario.php');
    
    $conn = null;
}else{
    echo"error al eliminar los datos";
}

?>