<?php
getConnectionLibrary();
getObjectClass();

class User extends MyObject {
	protected $id;
	protected $name;
	protected $address;

	function __construct($id=NULL, $name=NULL, $address=NULL) {
		parent::sync();
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