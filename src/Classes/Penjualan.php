<?php
namespace Class;

class Penjualan {
	private $id = null;
	public function __construct() {
		$this->id = core()->user->getId();
	}
	public function addTransaction() {

	}
	public function historyPenjualan($id = null) {

	}
}