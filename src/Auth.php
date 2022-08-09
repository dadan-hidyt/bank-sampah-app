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
	public function tokenUser() {
		$session_hash = 'null';
		if(session()->get('_xht')) {
			$session_hash = session()->get('_xht');
		} else {
			$session_hash = cookie()->get('_xht');
		}
		//check dulu apakah ada di database
		$now = time();
		$check = db()->query("SELECT token,id_pengguna,expire FROM tb_sessions WHERE token='$session_hash'");
		if ($check && $check->num_rows > 0 && !empty($session_hash)) {
			return $check->fetch_assoc();
		}
		return false;
	}
	public function isLogin() {
		if(is_null($this->tokenUser())) {
			return false;
		}else {
			$token_data = $this->tokenUser();
			$expire = $this->tokenUser()['expire'];
			if(!empty($token_data) && time() < $expire) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}
	public function userData() {
		$id_pengguna = $this->tokenUser()['id_pengguna'] ?? false;
		if ($id_pengguna) {
			$data = db()->query("SELECT * FROM tb_pengguna WHERE id_pengguna='$id_pengguna'");
			if($data && $data->num_rows > 0) {
				return $data->fetch_assoc();
			}
		}
		
	}
	public function getId() {
		return $this->id;
	}
	//register
}