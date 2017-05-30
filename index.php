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
    <link rel="stylesheet" href="./assets/css/style.css">
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
            <a class="navbar-brand" href="#">Pizzas RainbowDash</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->

        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="./public/video.mp4" autoplay loop="">
      </video>
    </div>

    <!-- FORMULARIO DEL MENU -->
    <div class="video-container vertical-center">
      <div class="front absolute card col-xs-12">
        <center><h2 class ="white-text">Bienvenidos a Pizzas RainbowCode</h2></center><br>
				<button type="button" class="form-control" onclick="location= './views/products/registroProducto.php'">Registrar Productos</button><br>
				<button type="button" class="form-control" onclick="location= './views/costumers/registroCliente.php'">Registro Cliente</button><br>
        <button type="button" class="form-control" onclick="location= './views/products/consultaProducto.php'">Catalógo de Productos</button><br>
        <button type="button" class="form-control" onclick="location= './views/orders/carrito.php'">Realizar Pedido</button><br>
      </div>
    </div>

  </body>
</html>
