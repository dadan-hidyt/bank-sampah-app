<?php
namespace Classes;

class Tabungan extends \User {
	public function __construct() {
		parent::__construct();
	}
	public function history($limit = null) {
		$id = $this->id;
		$sql = "SELECT * FROM tb_tabungan WHERE id_pengguna='$id'";
		if ($limit === true) {
			$sql .= ' LIMIT '.$limit;
		}
		$run_query = db()->query($sql);
		$history = [];
		if ($run_query) {
			while ($datas = $run_query->fetch_assoc()) {
				$history[] = $datas;
			}
		}
		return $history;
	}
	//dapatkan saldo
	public function saldo() {
		$id = $this->getId();
		$run_query = db()->query("SELECT saldo as saldo FROM tb_tabungan WHERE id_pengguna='$id' ORDER BY id DESC");
		if ($run_query) {
			return formatRupiah($run_query->fetch_object()->saldo ?? 0);
		}
		return 0;
	}
	/**
	 * untuk mendapatkan saldo keluar
	 */
	public function saldoKeluar($limit = null) {
		$data = [];
		$id = $this->getId();
		$sql = "SELECT saldo_keluar as jumlah_saldo,tanggal,deskripsi FROM tb_tabungan WHERE id_pengguna='$id'";
		if ($limit) {
			$sql .= ' LIMIT '.$limit;
		}
		if ($query = db()->query($sql)) {
			while ($saldo_keluar = $query->fetch_assoc()) {
			    if ($saldo_keluar['jumlah_saldo'] == 0) {
			    	continue;
			    }
			    $data[] = $saldo_keluar;
			}
		}
		return $data;
	}
	/**
	 * untuk menadapatkan saldo masuk
	 */
	public function saldoMasuk($limit = null) {
		$data = [];
		$id = $this->getId();
		$sql = "SELECT saldo_masuk as jumlah_saldo,tanggal,deskripsi FROM tb_tabungan WHERE id_pengguna='$id'";
		if ($limit) {
			$sql .= ' LIMIT '.$limit;
		}
		if ($query = db()->query($sql)) {
			while ($saldo_keluar = $query->fetch_assoc()) {
			    if ($saldo_keluar['jumlah_saldo'] == 0) {
			    	continue;
			    }
			    $data[] = $saldo_keluar;
			}
		}
		return $data;
	}
}