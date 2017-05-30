<?php
//SE REVISA QUE FUNCION TENGA ALGO, COMO INSERTARPRODUCTOS O ALGO ASI
if( isset($_POST['funcion']) ) {
	//DEPENDIENDO DE QUE DIGA FUNCION SE ENTRE A UN CASO DE SWITCH
	switch ($_POST['funcion']) {
			case 'insertarProductos':
				echo "entrando a insertar";
				//echo 'Hola AJAX '.$_POST['funcion'];

				//COSAS QUE SE OCUPAN, PARA QUE SIRVAN
				require_once("../models/Product.php");
				require_once("../models/Cleaner.php");

				//SE PASA EL ARREGLOJSON A UN ARREGLO PHP
				$productos = json_decode($_POST['productos']);

				//CICLO PARA LEER EL ARREGLO
				foreach ($productos as $item) {
					$nombre = Cleaner::cleanInput($item->_nombre);
					//SE CREA UN OBJETO DE LA CLASE PRODUCT LA CUAL ESTA EN MODEL/Product
					$producto = new Product($item->_nombre,$item->_precio,$item->_categoria,$item->_descripcion);
					//METODO QUE GUARDA, ESTA EN MODEL/PRODUCT
					$producto->save();
				}
			break;

			case 'consultaProductos':
			include_once("../../models/Product.php");
			$productos = Product::get();
			break;

			case 'actualizarProducto':
			require_once("../models/Product.php");
			echo "entrando a actualizar";
			$idProd = $_POST['productos'];
			$costoN = $_POST['costo'];
			echo $costoN;
			Product::update($idProd, $costoN);
			break;

			//EL DEFAULT SE UTILIZARA PARA EL DELETE DEL CRUD
			default:
			require_once("../models/Product.php");
				echo "entrando a eliminar";
				//SE TOMA EL ID DEL PRODUCTO QUE SE VA A ELIMINAR
				$idProd = $_POST['productos'];
				$aux = Product::delete($idProd);
				echo $aux;
			break;
		}
} else {
	include_once("../../models/Product.php");
	$productos = Product::get();
}
