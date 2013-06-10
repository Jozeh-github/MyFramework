<?php
class MySQL {
	private $host = '';
	private $user = '';
	private $password = '';
	private $schema = '';
	private $type = '';
	private $connection = NULL;
	private $debug = false;

	function __construct() {
		$this->host = DB_HOST;
		$this->schema = DB_SCHEMA;
		$this->user = DB_USER;
		$this->password = DB_PASSWORD;
		$this->type = DB_TYPE;
	}
	public function showError($message = '') {
		if($this->debug) {
			if($message != '') {
				die($message);
			}
			else {
				die(mysql_error());
			}
		}
		else {
			die("");
		}
	}
	public function open() {
		if(!is_resource($this->connection)) {
			$this->connection = mysql_connect($this->host, $this->user, $this->pass);
			if(is_resource($this->connection)) {
				if(!mysql_select_db($this->schema, $this->connection)) {
					$this->showError();
				}
				else {
					mysql_query('Set names utf8');
				}
			}
			else {
				$this->showError();
			}
		}
		return $this;
	}
	public function close() {
		if(is_resource($this->connection)) {
			mysql_close($this->connection);
			$this->connection = NULL;
		}
		return $this;
	}
	public function isOpen() {
		return $this->connection;
	}
	public function insert($query = '') {
		if(trim($query) != '') {
			mysql_query($query, $this->connection) or $this->showError();
			return mysql_insert_id($this->connection);
		}
		else {
			return $this->showError('The query is empty.');
		}
	}
	public function execute($query = '') {
		if(trim($query) != '') {
			return mysql_query($query, $this->connection) or $this->showError();
		}
		else {
			return $this->showError('The query is empty.');
		}
	}
	public function query($query = '') {
		if(trim($query) != '') {
			if(is_resource($this->connection)) {
				return new MySQLResult($query, $this->connection);
			}
		}
		else {
			$this->showError('The query is empty.');
		}
	}
	public function listFromQuery($query = '') {
		if(trim($query) != '') {
			$output = array();
			$this->open();
			$result = new MySQLResult($query, $this->connection);
			$result->fetchRows();
			while($result->hasRows()) {
				array_push($output, $result->item);
			}
			$this->close();
			return $output;
		}
		else {
			$this->showError('The query is empty.');
		}
	}
}
class MySQLResult {
	var $connection = NULL;
	var $data = NULL;
	var $item = NULL;
	var $rows = 0;
	var $curr = 0;
	var $size = 0;
	var $query = '';
	var $debug = true;
	
	function MySQLResult($query, $connection) {
		$this->query = $query;
		$this->connection = $connection;
	}
	public function setPagination($curr, $size) {
		$this->curr = $curr;
		$this->size = $size;
	}
	public function fetchRows() {
		if($this->curr != 0) {
			$this->data = mysql_query('Select count(*) as total from ('.$this->query.');') or $this->showError();
			$this->hasRows();
			$this->rows = $this->getField('total');
			
			$this->data = mysql_query($this->query.' limit '.(($this->curr-1)*$this->size).', '.$this->size,';', $this->connection) or $this->showError();
		}
		else {
			$this->data = mysql_query($this->query, $this->connection) or $this->showError();
			$this->rows = mysql_num_rows($this->data);
		}
	}
	public function showError($message = '') {
		if($this->debug) {
			if($message != '') {
				die($message);
			}
			else {
				die(mysql_error());
			}
		}
		else {
			die('');
		}
	}
	public function getTotal() {
		return $this->rows;
	}
	public function getPage() {
		return $this->curr;
	}
	public function getPages() {
		$tpages = ceil($this->rows/$this->size);
		return $tpages;
	}
	public function countRows() {
		if(is_resource($this->data)) {
			return mysql_num_rows($this->data);
		}
		else {
			$this->showError('Empty data');
		}
	}
	public function hasRows() {
		if(is_resource($this->data)) {
			$this->item = mysql_fetch_assoc($this->data);
			return $this->item;
		}
		else {
			$this->showError('Empty data');
		}
	}
	public function getField($field) {
		return $this->item[$field];
	}
	public function seekRow($num) {
		if(is_resource($this->data)) {
			mysql_data_seek($this->data, $num);
			return $this->fetchRows();
		}
		else {
			$this->showError('No Data');
		}
	}
	public function getFirst() {
		return $this->seekRow(0);
	}
}
?>