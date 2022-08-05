<?php

class Config {
	private $config = [];

	public function __construct() {
		if (defined('CONFIG')) {
			$this->config = CONFIG;
		}
	}
	/***
	 * config.user.name.data;
	 * */
	public function get($key) {
		if (array_key_exists($key, $this->config)) {
			$val =  $this->config[$key];	
			if (is_array($val)) {
				return $this->_to_object($val);
			}
			return $val;
		} else {
			throw new Exception("Config key not found!");
			
		}
	}
	public function _to_object($array) {
		$std = new StdClass();
		foreach($array as $ar => $value) {
				$std->{$ar} = $value;
				if(is_array($value)) {
					$std->{$ar} = $this->_to_object($value);
				}
		}
		return $std;
	}
	public function replace($key,$new_value) {
		if(isset($this->config[$key])) {
			$this->config[$key] = $new_value;
		}
	}
	public function set($key, $value) {
		if (!isset($this->config[$key])) {
			$this->config[$key] = $value;
		}
	}
	public function __get($key) {
		if (isset($this->config[$key])) {
			var_dump($this->_to_object($this->config));
		}
	}

}