<?php
/**
 *User class untuk menangani user 
 */
class User {
	protected $id;
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
	public function getPhoto() {
		if($this->dataPengguna()) {
			return $this->dataPengguna()->photo_profile;
		}
	}
	public function getAkses() {
		return $this->dataPengguna()->sebagai ?? null;
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
		$saldo = (new Classes\Tabungan())->saldo();
		if ($saldo) {
			return $saldo;
		}
		return 0;
		
	}
	public function usernameExists($username) {
		return db()->query("SELECT username FROM tb_pengguna WHERE username='{$username}' LIMIT 1")->num_rows > 0;
	}
	public function emailExists($email)
	{
		return db()->query("SELECT email FROM tb_pengguna WHERE email='{$email}' LIMIT 1")->num_rows > 0;
	}
	public function updatePassword($password) {
		$id = $this->id;
		//check dulu apakah password nya sama
		$sql1 = db()->query("SELECT password FROM tb_pengguna WHERE id_pengguna='$id'")->fetch_assoc();
		if(password_verify($password, $sql1['password'])) {
			throw new Exception("Password sama dengan password yang dulu!");
		}
		$password = password_hash($password, PASSWORD_DEFAULT);
		if(db()->query("UPDATE tb_pengguna SET password='$password' WHERE id_pengguna='$id'")) {
			return true;
		} else {
			throw new Exception(db()->query_error);
		}
	}
	public function editEmail($email) {

	}
	public function editUsername($username) {
		
	}
}
