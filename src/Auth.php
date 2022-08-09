<?php
class Auth {
	private $remember = false;
	private $userID;
	private $userData;
	/**
	 * jika user klik remember
	 * */
	public function isRemember($remember = false) {
		$this->remember = $remember;
	}
	public function doLogin(array $data = []) {
		//check username
		$email = $data['email'] ?? null;
		$password = $data['password'] ?? null;
		$check = db()->query("SELECT id_pengguna,email,password FROM tb_pengguna WHERE email='$email' OR username='$email'");
		if ($check->num_rows > 0) {
			$user_data = $check->fetch_assoc();
			//check password
			if (password_verify($password, $user_data['password'])) {
				//fitur remember
				$this->setSessionUser($user_data['id_pengguna']);
				return true;
			} else {
				throw new Exception("Kata sandi salah!");
			}
		}
		throw new Exception('Email atau password belum terdaftar!');
	}
	public function setSessionUser($id) {
		//crete sessionfor user
		$cookie_expire = strtotime('+1year');
		$hash = hash('sha256', $id.time().$cookie_expire);
		$ip = '192.168.43.253';
		$platform = 'Windows';
		$browser = 'Chrome';
		$time_now = time();
		//chrome
		db()->connect()->begin_transaction();
		db()->connect()->query("
			INSERT INTO tb_sessions (id_pengguna,ip,token,platform,browser,create_at,expire) 
			VALUES ('$id','$ip','$hash','$platform','$browser','$time_now','$cookie_expire')");
		if($this->remember) {
			if (cookie()->set('_xht',$hash,$cookie_expire,'/')) {
			db()->connect()->commit();
		}
	} else{
		session()->set('_xht',$hash);
	}
		db()->connect()->rollback();
		return false;
	}
	public function getSessionUser($has) {
		//
	}
	public function getUserData() {
		return $this->userData;
	}
	public function getId() {
		return $this->id;
	}
	//register
}