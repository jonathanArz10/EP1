<?php
	include_once("../../controllers/ProductsController.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="../../assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">Home</a>
          </div>
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="../../public/video.mp4" autoplay loop="">
      </video>
    </div>
    <br><br>
    <!-- TABLA DE PRODUCTOS -->
    <div>
      <div class="col-md-1"></div>
      <div class="col-md-11">
        <table class="table">
          <tr>
            <th><h4 class="white-text">ID</h4></th>
            <th><h4 class="white-text">Nombre</h4></th>
            <th><h4 class="white-text">Descripción</h4></th>
            <th><h4 class="white-text">Precio</h4></th>
            <th><h4 class="white-text">Categoria</h4></th>
          </tr>
            <?php
    					foreach ($productos as $producto) {
    				?>
            <tr>
    						<th><h4 class="white-text"><?php echo $producto['id']; ?></h4></th>
                <th><h4 class="white-text"><?php echo $producto['nombre']; ?></h4></th>
                <th><h4 class="white-text"><?php echo $producto['descripcion']; ?></h4></th>
                <th><h4 class="white-text"><?php echo $producto['precio']; ?></h4></th>
                <?php
                  switch ($producto['categoria_id']) {
                    case '1':?>
                      <th><h4 class="white-text">Pizzas</h4></th>
                    <?php  break;

                    case '2':?>
                      <th><h4 class="white-text">Pastas</h4></th>
                      <?php break;

                    case '3':?>
                      <th><h4 class="white-text">Ensaldas</h4></th>
                      <?php break;

                    default:?>
                      <th><h4 class="white-text">Bebidas</h4></th>
                      <?php break;
                  }
                ?>
            </tr>
    				<?php
    					}
    				?>
        </table>
      </div>
    </div>

  </body>
</html>
