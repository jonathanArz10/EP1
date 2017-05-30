<?php
	include_once("../../controllers/CostumersController.php");
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

    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
		<div class="video-container vertical-center">
      <div class="front absolute card col-xs-12">
        <h2 class ="white-text">Datos del cliente</h2>
        <input type="text" class="form-control" id="nombre" value="" placeholder="Nombre "><br>
        <input type="text" class="form-control" id="telefono" value="" placeholder="Telefóno"><br>
				<textarea class="form-control" id="direccion" placeholder="Dirección"></textarea>
				<br>
        <button type="button" class="form-control" id="guardar">Guardar</button>
      </div>
    </div>

    <!-- container -->
    <script src="../../assets/js/cliente.js" charset="utf-8"></script>
    <script type="text/javascript">
      let guardar = document.querySelector("#guardar");
      guardar.addEventListener('click',function(){
        let nombre = document.querySelector("#nombre");
        let telefono = document.querySelector("#telefono");
				let direccion = document.querySelector("#direccion");


        let cliente = new Cliente(nombre.value,telefono.value,direccion.value);
				nombre.value="";
				telefono.value="";
				direccion.value="";
				let listaclientes = new Array();
				listaclientes.push(cliente);
				let arregloJSON = JSON.stringify(listaclientes);
				console.log(arregloJSON);
				$.ajax({
				  method: "POST",
				  url: "../../controllers/CostumersController.php",
				  data: { clientes: arregloJSON, funcion: "insertarClientes" }
				})
				.done(function() {
				   console.log( "Datos guardados ");
				 });
      });
    </script>
  </body>
</html>
