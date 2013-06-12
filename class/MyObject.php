<?php
class MyObject {
	private $restrictedToGet;
	private $restrictedToSet;

	function __construct() {
		$this->restrictedToGet = array();
		$this->restrictedToSet = array();
	}
	public function __call($function, $params) {
		if(strpos($function, 'get') === 0)
		{
			$variable = strtolower(str_replace('get', '', $function));
			if(in_array($variable, $this->restrictedToGet))
			{
				return $this->{$variable};
			}
		}
		elseif(strpos($function, 'set') === 0)
		{
			$variable = strtolower(str_replace('set', '', $function));
			if(in_array($variable, $this->restrictedToSet))
			{
				$this->{$variable} = $params[0];
			}
		}
	}
}
?>