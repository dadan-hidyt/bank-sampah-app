<?php
namespace Class;

class Penjualan {
	private $id = null;
	public function __construct() {
		$this->id = core()->user->getId();
	}
	public function buatTransaksi($data = []) {
		$id_invoce = createInvoice('JL');
		$id_penampung = $this->id;

	}
	/**
	 * Mendapatkan history penjualan
	 * */
	public function historyPenjualan($id = null) {

	}
}