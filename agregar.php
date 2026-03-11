<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/css/agregar.css" rel="stylesheet" />
  <title>HOSK</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="Conexion/registrarproducto.php" method="post" enctype="multipart/form-data">
                    <h2>Agregar</h2>
                    <div class="inputbox">
                        <ion-icon name="list-outline"></ion-icon>
                        <input type="text" required name="nombre">
                        <label for="">Nombre</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="cash-outline"></ion-icon>
                        <input type="number" required name="precio">
                        <label for="">Precio</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="albums-outline"></ion-icon>
                        <input type="text" required name="categoria">
                        <label for="">Categoria</label>
                    </div>
                    <div >
                        <br>
                        <input type="file" required name="imagen">
                        
                    </div>
                    <br><br>
                    <button name="btnregistro" class="btn" type ="submit">Registrar</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
</html>