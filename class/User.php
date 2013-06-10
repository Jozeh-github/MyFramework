<?php
getConnectionLibrary();

class User {
	private $id;
	private $name;
	private $address;
	private $connection;

	function __construct($id=NULL, $name=NULL, $address=NULL) {
		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
	}
	public function getNamesList() {
		$connection = getConnectionObject();
		return $connection->listFromQuery('Select name from tb_user');
	}
}
?>