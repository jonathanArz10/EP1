<?php

if( isset($_POST['funcion']) ) {
	//echo 'Hola AJAX '.$_POST['funcion'];

	require_once("../models/Client.php");
	require_once("../models/Cleaner.php");

	$clientes = json_decode($_POST['clientes']);

	foreach ($clientes as $item) {
		$nombre = Cleaner::cleanInput($item->_nombre);
		$telefono = Cleaner::cleanInput($item->_telefono);
		$direccion = Cleaner::cleanInput($item->_direccion);
		$cliente = new Client($item->_nombre,$item->_telefono,$item->_direccion);
		$cliente->save();
	}


} else {
	include_once("../../models/Client.php");
	$clientes = Client::get();
}
