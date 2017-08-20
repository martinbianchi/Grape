<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eliminar Producto</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/style.css" media="screen" rel="StyleSheet" type="text/css">
  </head>
  <body>
      <!-- Navigation -->
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Grape</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php
            if(isset($_SESSION['nombre_usuario'])) {
                echo '<ul class="nav navbar-nav">';
                echo '<li class="active"><a href="#">'.$_SESSION['nombre_usuario'].'<span class="sr-only">(current)</span></a></li>';
                echo '</ul>';
            }
            else {
                echo '<ul class="nav navbar-nav">';
                echo '<li class="active"><a href="log-in.php">Entrar <span class="sr-only">(current)</span></a></li>';
                echo '</ul>';
                echo '<ul class="nav navbar-nav">';
                echo '<li class="active"><a href="registrarse.html">Registrarse <span class="sr-only">(current)</span></a></li>';
                echo '</ul>';
            }
        ?>
          <form class="navbar-form navbar-right" action="resultado-busqueda.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" title="Buscar" name="busqueda" placeholder="Buscar whiskies, vinos...">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      <div class="row">
        <div class="col col-md-6">
          <h1>Baja de producto</h1>
          <?php
            include("conexion.inc");

            $ID_Bebida = $_POST['id_bebida'];
            $vEliminar = "delete from bebidas where id_bebida = '$ID_Bebida'";

            $resultado = mysqli_query($link, $vEliminar) or die(mysqli_error($link));
            if($resultado) {
              echo "<h4>Producto eliminado correctamente.</h4>";
            }

            mysqli_close($link);
            ?>
            <a href="listado-productos.php">Volver al listado</a>  
        </div>
      </div>
    </div>

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; The Grape Company 2017</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
  </body>
</html>