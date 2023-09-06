<?php
function conectaDb(){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=cinea','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  echo "conexion exitosa"; 
        return $conn;
    }catch(PDOException $e){
        echo "ERROR: No se pudo conectar a la base de datos: ".$e->getMessage();
    }
}
?>