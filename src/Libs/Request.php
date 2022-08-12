<?php 
namespace Libs;
class Request {
	private function input_sanitize($string) {
		return $string;
	}
	public function method() {
		if(php_sapi_name() !== 'cli') {
			return $_SERVER['REQUEST_METHOD'] ?? null;
		}
	}
	public function post($key = null) {
		if ($key) {
			if (array_key_exists($key, $_POST)) {
				return $_POST[$key];
			}
		} else {
			return $_POST;
		}
	}
	public function get($key = null) {
		if ($key) {
			if (array_key_exists($key, $_GET)) {
				return $_GET[$key];
			}
		} else {
			return $_GET;
		}
	}
	public function has($key) {
		if (isset($_GET[$key]) OR isset($_POST[$key])) {
			return true;
		}
		return false;
	}
	public function is_ajax() {
		echo $this->get('isAjax');
		$xml_http_request = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? null;
		if($this->get('isAjax') == 1 || strtolower($xml_http_request) == strtolower('xmlhttprequest')) {
			return true;
		}
		return false;
	}
	public function request($data) {
		var_dump($data);
	}
	
}




 ?>