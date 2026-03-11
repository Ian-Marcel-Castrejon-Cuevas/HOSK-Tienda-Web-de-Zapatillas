<?php
session_start();
session_destroy();
include('conexion_bd.php');
mysqli_close($conexion);
header("location:../index.html");
?>