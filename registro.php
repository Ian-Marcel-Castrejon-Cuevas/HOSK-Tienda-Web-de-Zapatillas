<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/css/registro.css" rel="stylesheet" />
  <title>HOSK</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="Conexion/registrar.php" method="post">
                    <h2>Registro</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" required name="nombre">
                        <label for="">Nombre Completo</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">Correo</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="save-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Contraseña</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="home-outline"></ion-icon>
                        <input type="text" required name="direccion">
                        <label for="">Direccion</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="number" required name="telefono">
                        <label for="">Telefono</label>
                    </div>
                    <button name="btnregistro" class="btn" type ="submit">Registrarme</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>