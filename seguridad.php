<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header('location:index.php?msn=Debe iniciar sesion');
    exit();
}
?>