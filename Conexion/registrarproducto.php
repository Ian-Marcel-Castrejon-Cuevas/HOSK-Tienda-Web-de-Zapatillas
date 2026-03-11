<?php

$nombre=$_POST["nombre"];
$nombre= strtoupper($nombre);
$precio=$_POST["precio"];
$categoria=$_POST["nombre"];
$categoria= strtoupper($categoria);
$imagen = $_FILES['imagen']['tmp_name'];
$imagen_contenido = addslashes(file_get_contents($imagen));

if($categoria == "PUMA"){
    $categoria = 1;
}
if($categoria == "NIKE"){
    $categoria = 2;
}
if($categoria == "ADIDAS"){
    $categoria = 3;
}

session_start();

include('conexion_bd.php');

$consulta = "INSERT INTO producto(Nombre,Precio,Id_Categoria,Imagen) VALUES ('$nombre','$precio','$categoria','$imagen_contenido'";
$resultado = mysqli_query($conexion,$consulta);

if ($resultado) {
    header("location:../agregar.php");
} else {
    echo "agregado";
}