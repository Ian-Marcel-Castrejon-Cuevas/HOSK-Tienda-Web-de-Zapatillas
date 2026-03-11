<?php

    $correo=$_POST["email"];
    $contraseña=$_POST["password"];

    include('conexion_bd.php');

    $consulta = "SELECT * FROM usuarios where Correo='$correo' and Clave='$contraseña'";

    $resultado = mysqli_query($conexion,$consulta);

    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
            $id = $row['Id_Usuarios'];
            $nombre = $row['Nombre'];
            $correo = $row['Correo'];
            $password = $row['Clave'];
            $direccion = $row['Direccion'];
            $telefono = $row['Telefono'];
            $nivel = $row['Nivel'];
        }

        $filas=mysqli_num_rows($resultado);

        if ($filas) {
            if($nivel != 0){
                header("location:../inicio.php");
                session_start();
                $_SESSION['usuario'] = $correo;
                $_SESSION['contra'] = $contraseña;
            }else{
                ?>
            <?php
            echo "USUARIO TODAVIA NO APROBADO";
            }
        }else {
            ?>
            <?php
            echo "USUARIO NO REGISTRADO";
        }
        mysqli_free_result($resultado);
    }
?>