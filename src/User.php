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
	//set data diri jika tidak ada
	public function setDataDiri() {
		//file
		$file_ktp = $_FILES['foto_ktp'];
		$file_kk = $_FILES['foto_kk'];
		$file = [];
		//untuk uplaod file
		$file['foto_kk'] = [
			'file_type' => 'KTP',
			'name' => randomFileName($file_kk['name']),
			'tmp' => $file_kk['tmp_name'],
			'size' => $file_kk['size'],
		];
		//foto KTP
		$file['foto_ktp'] = [
			'file_type' => 'KK',
			'name' => randomFileName($file_ktp['name']),
			'tmp' => $file_ktp['tmp_name'],
			'size' => $file_ktp['size'],
		];
		$data['id_pengguna'] = $this->getId();
		//tangkap inputan dari user dan filter string
		foreach (request()->post() as $key => $value) {
			$data[$key] = db()->connect()->real_escape_string(strip_tags(htmlentities($value)));
		}
		$data['foto_ktp'] = 'files/'.core()->user->getUsername().'/'.$file['foto_ktp']['name'];
		$data['photo_kk'] = 'files/'.core()->user->getUsername().'/'.$file['foto_kk']['name'];
		//sql statement
		$sql = sprintf("
			INSERT INTO `tb_datadiri`
			(`id_diri`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`agama`,`alamat`,`rt`,`rw`,`kelurahan_desa`,`kecamatan`,`kabupaten`,`provinsi`,`no_ktp`,`foto_ktp`,`photo_kk`) 
			VALUES
			('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			$data['id_pengguna'],$data['nama_lengkap'],$data['tempat_lahir'],$data['tanggal_lahir'],$data['agama'],$data['alamat'],$data['rt'],$data['rw'],$data['kelurahan_desa'],$data['kecamatan'],$data['kabupaten'],$data['provinsi'],$data['no_ktp'],$data['foto_ktp'],$data['photo_kk']);
		//insert data 
		if (!empty(core()->user->dataDiri())) {
			session()->flashWarning('data_diri_edited','Data sudah ada di database');
			return redirect('akun.php?data-diri&edit');
		}
		$err = null;
		foreach ($file as $value) {
			if ($value['size'] > 5000000) {
				$err .= 'File '.$value['file_type'].' Tidak melebihi <br>';
			} else {
				upload($value['name'], $value['tmp'],ROOT_PATH.'files'.DS.core()->user->getUsername());
			}
		}
		if (is_null($err)) {
			db()->connect()->query($sql);
			session()->flashWarning('data_diri_edited','Data berhasil di tambahkan');
			return redirect('akun.php?data-diri&edit');
		} else {
			session()->flashWarning('data_diri_edited',$err);
			return redirect('akun.php?data-diri&edit');
		}
	}
	//update data diri
	public function updateDataDiri() {
		$data = array_map(function($v){
			return db()->connect()->escape_string(htmlspecialchars($v));
		}, request()->post());
		unset($data['update_data_diri']);
		$data_diri = $this->dataDiri();	
		$file_kk = $file_kk_old = $data_diri->photo_kk;
		$file_ktp = $file_ktp_old = $data_diri->foto_ktp;
		//net foto kk
		$foto = [
			'foto_kk' => $_FILES['foto_kk'],
			'foto_ktp' => $_FILES['foto_ktp'],
		];
		if (
			$foto['foto_kk']['error'] != UPLOAD_ERR_NO_FILE 
			&& in_array(strtolower(pathinfo($foto['foto_kk']['name'],PATHINFO_EXTENSION)), ['jpg','png','jpeg'])
		) {
			$_file_kk = true;
			$file_kk = randomFileName($foto['foto_kk']['name']);
			$foto['foto_kk']['random_name'] = $file_kk;
		}
		if (
			$foto['foto_ktp']['error'] != UPLOAD_ERR_NO_FILE
			&& in_array(strtolower(pathinfo($foto['foto_ktp']['name'],PATHINFO_EXTENSION)), ['jpg','png','jpeg'])
		) {
			$_file_ktp = true;
			$file_ktp = randomFileName($foto['foto_ktp']['name']);
			$foto['foto_ktp']['random_name'] = $file_ktp;
		}

		$id = $this->getId();
		$sql = sprintf("UPDATE
			`tb_datadiri`
			SET
			`nama_lengkap` = '%s',
			`tempat_lahir` = '%s',
			`tanggal_lahir` = '%s',
			`agama` = '%s',
			`alamat` = '%s',
			`rt` = '%s',
			`rw` = '%s',
			`kelurahan_desa` = '%s',
			`kecamatan` = '%s',
			`kabupaten` = '%s',
			`provinsi` = '%s',
			`no_ktp` = '%s',
			`foto_ktp` = '%s',
			`photo_kk` = '%s'
			WHERE
			id_diri='$id'",
			$data['nama_lengkap'],
			$data['tempat_lahir'],
			$data['tanggal_lahir'],
			$data['agama'],
			$data['alamat'],
			$data['rt'],
			$data['rw'],
			$data['kelurahan_desa'],
			$data['kecamatan'],
			$data['kabupaten'],
			$data['provinsi'],
			$data['no_ktp'],
			$_file_ktp ?? false ? 'files/'.$this->getUsername().'/'.$file_ktp : $file_ktp,
			$_file_kk ?? false ? 'files/'.$this->getUsername().'/'.$file_kk : $file_kk,
		);
		if (db()->query($sql)) {
			foreach ($foto as $key => $value) {
				if (isset($value['random_name'])) {
					if (upload($value['random_name'],$value['tmp_name'],ROOT_PATH.'files'.DS.core()->user->getUsername()) && in_array(strtolower(pathinfo($value['name'],PATHINFO_EXTENSION)), ['jpg','png','jpeg'])) {
						if ($key === 'foto_ktp') {
							@unlink(ROOT_PATH.str_replace('/', DS, $file_ktp_old));
						} else if($key === 'foto_kk') {
							@unlink(ROOT_PATH.str_replace('/', DS, $file_kk_old));
						}
					}
				} else {
					continue;
				}
			}
			session()->flashSuccess('data_diri_edited','Data berhasil di edit');
			return redirect('akun.php?data-diri&edit');
		}
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
