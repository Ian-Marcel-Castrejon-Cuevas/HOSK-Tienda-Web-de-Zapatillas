<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/css/login.css" rel="stylesheet" />
  <title>HOSK</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="Conexion/validar.php" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">Correo</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Contraseña</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">No <a href="#">olvidar mi contraseña</a></label>
                      
                    </div>
                    <button name="btningresar" class="btn" type ="submit">Ingresar</button>
                    <div class="register">
                        <p>No tengo cuenta <a href="registro.php">Registrarme</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>