<?php
include "conexion.php";
include "seguridad.php"; 
$conn = conectaDb();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultar</title>
    <link rel="stylesheet" type='text/css' media='screen' href="css/style.css">
    <script src='main.js'></script>

</head>
<body>
<?php
            $sql=$conn -> prepare("SELECT *FROM usuario");
            $sql -> execute();
            $rta=$sql->fetchAll();

            if($rta !=0){

            
                ?>
    <table border="1">
        <thead class="cinee">
            <tr>
                

              <th>tipo de identidad</th> 
              <th>Numero de documento</th> 
              <th>nombre de usuario</th>  
              <th>apellido usuario</th>
              <th>telefono usuario</th> 
              <th>fecha nacimiento usuario</th> 
              
                 
            </tr>
        </thead>
        <tbody>

            <?php
             foreach($rta as $row){
            ?>
            
                <tr>
                <td><?php echo $row['typedniuser'];?></td>
                <td><?php echo $row['dniuser'];?></td>
                <td><?php echo $row['nameuser'];?></td>
                <td><?php echo $row['surnameuser'];?></td>
                <td><?php echo $row['emailuser'];?></td>
                <td>
                    <a href="formulario.php?x=<?php echo $row['iduser']; ?>"><button> actualizar</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <a href="deleteuser.php?x=<?php echo $row['iduser']; ?>"><button> eliminar </button></a>
                    
                </td>
                </tr>
                
                <?php
            }

            $conn=null;

        }else{
            echo"la tabla esta sin registro";
        }
    ?>
    
        </tbody>
    </table>
    <a href="panelPrincipal.php">Volver al inicio</a>
</body>
</html>



            