<?php
include_once("Database.php");
class Client {
	public $name;
	public $direction;
	public $phone;

	public function __construct($name, $direction, $phone) {
      $this->name = $name;
			$this->direction = $direction;
	    $this->phone = $phone;

  }
	//mysqli->insert_id
	// return rows

	public function save(){
		$db = new Database();
		$sql = "INSERT INTO Cliente(nombre, direccion, telefono) VALUES(
			'".$this->name."',
			'".$this->direction."',
	    $this->phone
		)";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
	}

	static function get(){
		$db = new Database();
		$sql = "SELECT * FROM cliente";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}
}
