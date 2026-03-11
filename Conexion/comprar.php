<?php
$nombre = $_POST['identificar'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantid'];
$total = ($precio * $cantidad);

session_start();

if ($_SESSION['usuario'] != null) {

  $correo = $_SESSION['usuario'];
  $contraseña = $_SESSION['contra'];

include('conexion_bd.php');

$consulta2 = "SELECT * FROM usuarios where Correo='$correo' and Clave='$contraseña'";
$resultado2 = mysqli_query($conexion,$consulta2);
if ($resultado2) {
    while ($row = $resultado2->fetch_array()) {
        $id = $row['Id_Usuarios'];
    }
}

$consulta = "INSERT INTO `ventas` (`Id_Usuarios`, `Id_Producto`, `Cantidad`, `Total`) VALUES ('$id', '$nombre', '$cantidad', '$total')";
$resultado = mysqli_query($conexion,$consulta);

if ($resultado) {
    header("location:../inicio.php");
} else {
    echo "ACCESO DENEGADO";
}
}