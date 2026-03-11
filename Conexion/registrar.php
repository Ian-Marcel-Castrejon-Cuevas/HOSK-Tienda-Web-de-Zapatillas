<?php
$nombre=$_POST["nombre"];
$correo=$_POST["email"];
$contraseña=$_POST["password"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
session_start();

include('conexion_bd.php');

$consulta = "INSERT INTO usuarios(Nombre,Correo,Clave,Direccion,Telefono,Nivel) VALUES ('$nombre','$correo','$contraseña','$direccion','$telefono','1')";
$resultado = mysqli_query($conexion,$consulta);

if ($resultado) {
    header("location:../login.php");
} else {
    echo "ACCESO DENEGADO";
}
mysqli_close($conexion);
