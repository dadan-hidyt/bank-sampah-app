<?php
/**
 *User class untuk menangani user 
 */
class User {
	private $id;
	const ADMIN = 'admin';
	const RT = 'rt';
	const RW = 'rw';
	const PENGELOLA = 'pengelola';
	const PENAMPUNG = 'penampung';
	const MEMBER = 'member';

	const AKSES = [
		self::ADMIN,
		self::RT,
		self::RW,
		self::PENAMPUNG,
		self::PENGELOLA,
	];

	public function __construct() {
		//get user data after login
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
		return $this->dataPengguna()->id_pengguna;
	}
	public function dataPengguna() {
		//get data pengguna
		$id = $this->id;
		$query = db()->query("SELECT tb_pengguna.*, tb_akses.nama_akses as sebagai FROM tb_pengguna INNER JOIN tb_akses ON tb_pengguna.id_akses = tb_akses.id_akses WHERE tb_pengguna.id_pengguna='$id' LIMIT 1");
		if($query && $query->num_rows > 0) {
			$data = $query->fetch_object();
			return $data;
		}
		return false;
	}
	public function isMember() {
		return $this->getAkses() === User::MEMBER;
	}
	public function isAdmin() {
		return $this->getAkses() === User::ADMIN;
	}
	public function isPenampung() {
		return $this->getAkses() ===  User::PENAMPUNG;
	}
	public function isPengelola() {
		return $this->getAkses() ===  User::PENGELOLA;
	}
	public function getUsername() {
		if($this->dataPengguna()) {
			return $this->dataPengguna()->username;
		}
	}
	public function getEmail() {
		if($this->dataPengguna()) {
			return $this->dataPengguna()->email;
		}
	}
	public function getAkses() {
		if($this->dataDiri()) {
			return $this->dataPengguna()->sebagai;
		}
	}
	public function dataDiri() {
		//get data pengguna
		$id = $this->id;
		$query = db()->query("SELECT * FROM tb_datadiri WHERE id_diri='$id' LIMIT 1");
		if($query && $query->num_rows > 0) {
			$data = $query->fetch_object();
			return $data;
		}
		return false;
	}
	public function getNama() {
		if($this->dataPengguna()) {
			return $this->dataDiri()->nama_lengkap ?? null;
		}
	}

	public function getSaldo() {
		$id = $this->getId();
		$run_query = db()->query("SELECT saldo as saldo FROM tb_tabungan WHERE id_pengguna='$id' ORDER BY id DESC");
		if ($run_query) {
			return formatRupiah($run_query->fetch_object()->saldo);
		}
		return 0;
	}
}
