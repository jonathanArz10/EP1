<?php

if( isset($_POST['funcion']) ) {
	//echo 'Hola AJAX '.$_POST['pedidos'].$_POST['cliente'];

	require_once("../models/Order.php");
	require_once("../models/Cleaner.php");

	$pedidos = json_decode($_POST['pedidos']);
  $cliente = $_POST['cliente'];
  $idO = Order::save1($cliente);
	foreach ($pedidos as $item) {
		$pedido = new Order($item->_producto_id,$item->_cantidad);
		$pedido->save2($idO);
	}
} else {
	include_once("../../models/Order.php");
	$pedidos = Order::get();
}
