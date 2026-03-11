<?php
$identificador = $_POST["identificador"];


session_start();

if ($_SESSION['usuario'] != null) {

  include('conexion_bd.php');

  $sql = "DELETE FROM producto WHERE Id_Producto = $identificador";
  $resultado = mysqli_query($conexion,$sql);

  $sql = "UPDATE ventas SET Id_Producto = 0 WHERE Id_Producto = $identificador";
  $resultado = mysqli_query($conexion,$sql);

if ($resultado) {
    header("location:../eliminar.php");
} else {
    echo "ERROR AL ELIMINAR LOS DATOS";
}

}