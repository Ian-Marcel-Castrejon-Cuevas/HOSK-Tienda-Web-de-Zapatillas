<?php

session_start();

if ($_SESSION['usuario'] != null) {

  $inc = include('Conexion/conexion_bd.php');

  $correo = $_SESSION['usuario'];
  $contraseña = $_SESSION['contra'];

  $consulta1 = "SELECT * FROM usuarios where Correo='$correo' and Clave='$contraseña'";

  $resultado1 = mysqli_query($conexion,$consulta1);

    if ($resultado1) {
        while ($row = $resultado1->fetch_array()) {
            $nivel = $row['Nivel'];
        }
    }

  $consulta = "SELECT * FROM producto";
  $resultado = mysqli_query($conexion,$consulta);
  if ($resultado) {
      $i = 0;
      while ($row = $resultado->fetch_array()) {
          $id[$i] = $row['Id_Producto'];
          $Categoria = $row['Id_Categoria'];
          

          $consulta2 = "SELECT Nombre FROM categoria WHERE (Id_Categoria = '$Categoria')";
          $resultado2 = mysqli_query($conexion,$consulta2);
          $row2 = $resultado2->fetch_array();

          $nombre[$i] = $row2['Nombre']." ".$row['Nombre'];
          $precio[$i] = $row['Precio'];
          $img[$i] = base64_encode($row['Imagen']);
          $i++;
      }
  }

  $sql = "SELECT COUNT(Id_Producto) AS registrose FROM producto";
  $resultado3 = mysqli_query($conexion,$sql);
  if ($resultado3) {
      $registros = mysqli_fetch_assoc($resultado3);
      $totalRegistros = $registros['registrose'];
  }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>HOSK</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <link rel="stylesheet" href="assets/css/fancybox/jquery.fancybox.css">
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/slippry.css">
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/estilo.css" rel="stylesheet" />
  <script src="assets/js/script.js"></script>
  <link rel="stylesheet" href="assets/color/default.css">
  <script src="assets/js/modernizr.custom.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
</head>

<body>

  <header>
    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">HOSK</a>
        </div>
        <div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <nav>
              <ul class="nav navbar-nav navbar-right">
                <li class="current"><a href="#"><?php echo $_SESSION['usuario'] ?></a></li>
                <?php
                    if($nivel > 1){
                ?>
                <li><a href="modificar.php"> MODIFICAR </a></li>
                <li><a href="eliminar.php"> eliminar </a></li>
                <li><a href="agregar.php"> agregar </a></li>
                <?php
                  }
                ?>
                <li><a href="Conexion/terminar.php"> SALIR </a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <section class="contenido">
        <div class="mostrador" id="mostrador">
        <div class="fila">
            <?php for ($i = 0; $i < 4; $i++) { ?>
            <form action="venta.php" method="post">
                    <button name="btningresar">
                        <div class="item">
                            <div class="contenedor-foto">
                                <img src="data:image/png;base64,<?php echo $img[$i]; ?>"/>
                            </div>
                            <input type="hidden" name="identificador" value="<?php echo $identificador[$i]; ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $nombre[$i]; ?>">
                            <p class="descripcion" name="descripcion"><?php echo $nombre[$i]; ?></p>
                            <input type="hidden" name="precio" value="<?php echo $precio[$i]; ?>">
                            <span class="precio" name="precio">$<?php echo $precio[$i]; ?></span>
                        </div>
                    </button>
            </form>
            <?php } ?>
            </div>

            <div class="fila">
            <?php for ($i = 4; $i < $totalRegistros; $i++) { ?>
            <form action="venta.php" method="post">
                    <button name="btningresar">
                        <div class="item">
                            <div class="contenedor-foto">
                                <img src="data:image/png;base64,<?php echo $img[$i]; ?>"/>
                            </div>
                            <input type="hidden" name="identificador" value="<?php echo $identificador[$i]; ?>">
                            <input type="hidden" name="descripcion" value="<?php echo $nombre[$i]; ?>">
                            <p class="descripcion" name="descripcion"><?php echo $nombre[$i]; ?></p>
                            <input type="hidden" name="precio" value="<?php echo $precio[$i]; ?>">
                            <span class="precio" name="precio">$<?php echo $precio[$i]; ?></span>
                        </div>
                    </button>
            </form>
            <?php } ?>
            </div>
        </div>
    </section>

  </section>
  <footer>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <ul class="social-network social-circle">
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="aligncenter">
              <p>
                &copy; HOSK - All right reserved
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x"></i></a>
  <script src="assets/js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/slippry.min.js"></script>
  <script src="assets/js/nagging-menu.js"></script>
  <script src="assets/js/jquery.nav.js"></script>
  <script src="assets/js/jquery.scrollTo.js"></script>
  <script src="assets/js/jquery.fancybox.pack.js"></script>
  <script src="assets/js/jquery.fancybox-media.js"></script>
  <script src="assets/js/masonry.pkgd.min.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/jquery.nicescroll.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <script src="assets/js/AnimOnScroll.js"></script>
  <script>
    new AnimOnScroll(document.getElementById('grid'), {
      minDuration: 0.4,
      maxDuration: 0.7,
      viewportFactor: 0.2
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#slippry-slider').slippry(
        defaults = {
          transition: 'vertical',
          useCSS: true,
          speed: 8000,
          pause: 3000,
          initSingle: false,
          auto: true,
          preload: 'visible',
          pager: false,
        }

      )
    });
  </script>

  <script src="assets/js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>

<?php
} else {
  echo "No hay una conexión activa a la base de datos.";
}
?>