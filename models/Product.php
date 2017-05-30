<?php
//CLASE PRODUCT EN PHP NO JS
include_once("Database.php");
class Product {
	public $name;
	public $price;
	public $category;
	public $description;

	public function __construct($name, $price, $category, $description) {
      $this->name = $name;
			$this->price = $price;
	    $this->category = $category;
	    $this->description = $description;
  }

	//mysqli->insert_id
	// return rows

	//FUNCION QUE GUARDA EN LA BD
	public function save(){
		$db = new Database();
		$sql = "INSERT INTO Producto(nombre, precio, categoria_id, descripcion) VALUES(
			'".$this->name."',
			$this->price,
	    $this->category,
			'".$this->description."'
		)";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return true;
	}

	static function get(){
		$db = new Database();
		$sql = "SELECT * FROM producto";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}

	static function delete($idProd){
		$db = new Database();
		$sql = "DELETE FROM producto WHERE id = '$idProd'";
		if($db->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	static function update($idProd, $costoN){
		$db = new Database();
		$sql = "UPDATE producto SET precio = '$costoN' WHERE id = '$idProd'";
		if($db->query($sql)){
			return true;
		}else{
			return false;
		}
	}
}
