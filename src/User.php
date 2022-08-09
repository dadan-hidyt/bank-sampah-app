<?php
class User {
	private $id;
	public function __construct() {
		$data = core()->auth->userData();
		$this->setId($data['id_pengguna'] ?? null);
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function addUser(array $data = []) {

	} 
	public function setDataDiri($id, array $data = []) {

	}
	public function getId() {
		return $this->dataPengguna()['id_pengguna'];
	}
	public function dataPengguna() {
		//get data pengguna
		$id = $this->id;
		$query = db()->query("SELECT tb_pengguna.*, tb_datadiri.*, tb_akses.nama_akses as sebagai FROM tb_pengguna RIGHT JOIN tb_datadiri ON tb_datadiri.id_diri = tb_pengguna.id_pengguna RIGHT JOIN tb_akses ON tb_pengguna.id_akses = tb_akses.id_akses WHERE tb_pengguna.id_pengguna='$id' LIMIT 1");
		if($query && $query->num_rows > 0) {
			$data = $query->fetch_assoc();
			return $data;
			}
		echo db()->query_error;
	}
	public function getAkses() {
		return $this->dataPengguna()['sebagai'];
	}
	public function getName() {
		return $this->dataPengguna()['nama_lengkap'] ?? null;
	}
	public function getSaldo() {
		return;
	}
}
