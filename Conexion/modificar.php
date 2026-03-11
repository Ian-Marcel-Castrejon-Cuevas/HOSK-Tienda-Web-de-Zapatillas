<?php
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$identificador = $_POST["identificador"];

$categoria = strtoupper($categoria);
$nombre = strtoupper($nombre);

session_start();

if ($_SESSION['usuario'] != null) {

    if($categoria == "PUMA"){
        $id = 1;
    }
    if($categoria == "NIKE"){
        $id = 2;
    }
    if($categoria == "ADIDAS"){
        $id = 3;
    }

include('conexion_bd.php');

$sql = "UPDATE producto SET Nombre = '$nombre' WHERE Id_Producto = $identificador";
$resultado = mysqli_query($conexion,$sql);

$sql = "UPDATE producto SET Precio = '$precio' WHERE Id_Producto = $identificador";
$resultado = mysqli_query($conexion,$sql);

$sql = "UPDATE producto SET Id_Categoria = '$id' WHERE Id_Producto = $identificador";
$resultado = mysqli_query($conexion,$sql);

if ($resultado) {
    header("location:../modificar.php");
} else {
    echo "ERROR AL ACTUALIZAR LOS DATOS";
}

}