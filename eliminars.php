<?php

$identificador = $_POST["identificador"];

session_start();

include('Conexion/conexion_bd.php');

if ($_SESSION['usuario'] != null) {

  $consulta = "SELECT * FROM producto WHERE Id_Producto = '$identificador'";
  $resultado = mysqli_query($conexion,$consulta);
  if ($resultado) {
      while ($row = $resultado->fetch_array()) {
          $nombre= $row['Nombre'];
          $precio = $row['Precio'];
          $categoria = $row['Id_Categoria'];

          $consulta2 = "SELECT Nombre FROM categoria WHERE (Id_Categoria = '$categoria')";
          $resultado2 = mysqli_query($conexion,$consulta2);
          $row2 = $resultado2->fetch_array();
        
          $ncategoria = $row2['Nombre'];
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/css/eliminar.css" rel="stylesheet" />
<style>
        .icon-button {
            background-color: #f1f1f1;
            border: none;
            color: #333;
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
        }

        .icon-button i {
            margin-right: 5px;
        }
    </style>
  <title>HOSK</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="Conexion/eliminar.php" method="post">
                    <h1>Eliminar</h1>
                    <div class="inputbox">
                    <ion-icon name="layers-outline"></ion-icon>
                    <input type="hidden" name="identificador" value=" <?php echo $identificador ?> ">
                    <br><br>
                        <label for=""><?php echo $ncategoria ?></label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="footsteps-outline"></ion-icon>
                        <br><br>
                        <label for=""><?php echo $nombre ?></label>
                    </div>
                    <div class="inputbox">
                    <ion-icon name="cash-outline"></ion-icon>
                    <br><br>
                        <label for=""><?php echo "$" . $precio ?></label>
                    </div>
                    <button class="icon-button" name="btningresar" type ="submit"><ion-icon name="cloud-download-outline"></ion-icon></button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
}
?>