<?php
  include_once("../../controllers/CostumersController.php");
	include_once("../../controllers/ProductsController.php");
  include_once("../../controllers/OrdersController.php");
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
    <br>

    <!-- FORMULARIO PARA MOSTRAR LOS PRODUCTOS REGISTRADOS -->
    <div class="container">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <select class="form-control" id="nombre">
              <?php
                foreach ($clientes as $cliente) {
              ?>
                  <option><?php echo $cliente['nombre']; ?></option>
              <?php
                }
              ?>
            </select><br>
            <button type="button" class="btn btn-primary form-control" onclick="pay(<?php echo $cliente['id']; ?>)">Realizar pedido</button>
      </div>
    </div>
    <br>
    <?php

      foreach ($productos as $producto) {
        ?>
        <div class="col-md-3">
          <?php

        switch ($producto['categoria_id']) {
          case '1':
            echo "<center><img src='../../public/imagenes/pizza.png' width='150' height='70'></center>";
          break;
          case '2':
            echo "<center><img src='../../public/imagenes/pasta.png' width='150' height='70'></center>";
          break;
          case '3':
            echo "<center><img src='../../public/imagenes/ensalada.png' width='120' height='70'></center>";
          break;

          default:
            echo "<center><img src='../../public/imagenes/coca.png' width='50' height='70'></center>";
            break;
        }

    ?>
          <h4>Nombre: <?php echo $producto['nombre']; ?></h4>
          <p>Descripión: <?php echo $producto['descripcion']; ?></p>
          <h5>Precio: $<?php echo $producto['precio']; ?></h5>
          <input type="number" class="form-control" id="cantidad" placeholder="Cantidad" onchange="document.getElementById('cantidad').value=this.value">
          <button type="button" class="btn btn-danger form-control" onclick="add(<?php echo $producto['id'];?>)">Agregar al carrito</button>
        </div>
      <<?php
      }
     ?>

    <!-- container -->
    <script src="../../assets/js/script.js" charset="utf-8"></script>
    <script src="../../assets/js/orden.js" charset="utf-8"></script>
    <script type="text/javascript">
      var pedidos = new Array();
      function add(idProducto){
        console.log(idProducto);
        let cantidad = document.querySelector("#cantidad");
        console.log(cantidad.value);
        let pedido = new Pedido_producto(idProducto,cantidad.value);
        pedidos.push(pedido);
      }

      function pay(idCliente){
        let arregloJSON = JSON.stringify(pedidos);
				console.log(arregloJSON);
        $.ajax({
				  method: "POST",
				  url: "../../controllers/OrdersController.php",
				  data: { pedidos: arregloJSON, cliente: idCliente, funcion: "insertaPedido" }
				})
				.done(function() {
				   console.log( "Dato ingresado ");
				 });
      }

    </script>
  </body>
</html>
