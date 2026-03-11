<?php

$nombre = $_POST["descripcion"];
$precio = $_POST["precio"];
$identificador = $_POST["identificador"];

session_start();

if ($_SESSION['usuario'] != null) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/css/venta.css" rel="stylesheet" />
  <title>HOSK</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="Conexion/comprar.php" method="post">
                    <h1>Carrito</h1>
                    <div class="inputbox">
                        <h3 style="text-align:center"><?php echo $nombre ?></h3>
                        <input type="hidden" name="identificar" value=" <?php echo $identificador ?> ">
                    </div>
                    <div class="inputbox">
                        <h3 style="text-align:center">$<?php echo $precio ?></h3>
                        <input type="hidden" name="precio" value=" <?php echo $precio ?> ">
                    </div>
                    <div class="inputbox">
                    <input type="number" name="cantid" style="text-align:center" placeholder="Cantidad">
                    </div>
                    <button name="btningresar" class="btn" type ="submit">Comprar</button>
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