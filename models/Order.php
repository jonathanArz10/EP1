<?php
include_once("Database.php");
class Order {
	public $producto_id;
	public $cantidad;

	public function __construct($producto_id, $cantidad) {
      $this->producto_id = $producto_id;
			$this->cantidad = $cantidad;
  }

	public function save1($cliente){
		$db = new Database();
    $sql = "INSERT INTO pedido(fecha, cliente_id, estado) VALUES(
			NOW(),
			'$cliente',
			'Pagado'
		)";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
    $db->close();
    return $lastId;
	}

  public function save2($idO){
		$db2 = new Database();
    $sql2 = "INSERT INTO pedido_producto(pedido_id, producto_id, cantidad) VALUES(
			$idO,
			$this->producto_id,
			$this->cantidad
		)";
		//echo $sql2;
		$db2->query($sql2);
		$db2->close();
	}


	static function get(){
		$db = new Database();
		$sql = "SELECT * FROM pedido_producto";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}
}
