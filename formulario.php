<?php
include "conexion.php";
include "seguridad.php"; 
$conn = conectaDb();

extract($_REQUEST);

$var_option = $_REQUEST['x'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>formulario</title>
    <link rel="stylesheet" type='text/css' media='screen' href="main.css">
    <script src='main.js'></script>

</head>
<body>

<form action="actualizarusuario.php" method="POST">

<?php
    $sql=$conn -> prepare("SELECT *FROM usuario WHERE iduser=?");
    $sql -> bindParam(1, $var_option);
    $sql ->execute();
    $rta=$sql->fetchAll();

    if ($rta !=0){
        foreach ($rta as $row){
?>
 <input type="hidden" name="xy" value="<?php echo  $row['iduser'];?>">

    <select name="tipodc_usua">
        <option disabled selected></option>
        <option <?php echo ($row['typedniuser'] ==  "TI") ? "selected" : "" ?> value="TI"> TI </option>
        <option <?php echo ($row['typedniuser'] ==  "CC") ? "selected" : "" ?> value="CC"> CC </option>
    <select><br></br>
    
       
        <input type="number" name="numdc_usua" value="<?php echo$row['dniuser'];?>" required><br/><br/>
    
        <input type="text" name="nombre_usua" value="<?php echo$row['nameuser'];?>" required><br/><br/>
            
        <input type="text" name="apellido_usua" value="<?php echo$row['surnameuser'];?>" required><br/><br/>

        <input type="text" name="correo_usua" value="<?php echo$row['emailuser'];?>" required><br/><br/>

       <!-- <input type="text" name="fechana_usua" value="<?php echo$row[''];?>" required><br/><br/> -->
        

        <input type="submit" value="actualizar">

        <?php        
             }

             $conn = null;

    }else{
        echo "La tabla esta sin registros";
    }
   ?>
</form>


</body>
</html>
   