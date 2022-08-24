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
		$ip = get_ip();
		$platform = getPlatform();
		$browser = getBrowser()->browser;
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
		if(!$this->tokenUser()) {
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
	//for get userdata
	public function userData() {
		$id_pengguna = $this->tokenUser()['id_pengguna'] ?? false;
		if ($id_pengguna) {
			$data = db()->query("SELECT * FROM tb_pengguna WHERE id_pengguna='$id_pengguna'");
			if($data && $data->num_rows > 0) {
				return $data->fetch_assoc();
			}
		}
		
	}
	//function for logout
	public function logout($callback) {
		//delete token di daatabase
		$token = $this->tokenUser()['token'];
		if (!empty($token)) {
			$exec = db()->query("DELETE FROM tb_sessions WHERE token='$token'");
			cookie()->set('_xht','',strtotime('-10y'),'');
			session_destroy();
			session_unset();
			return $callback();
		}
	}
	public function loginInfo() {
		$id = $this->userData()['id_pengguna'];
		$token = cookie()->get('_xht');
		if (!empty(session()->get('_xht'))) {
			$token = session()->get('_xht');
		}
		$ip = get_ip();
		return db()->query("SELECT * FROM tb_sessions WHERE id_pengguna='$id' AND token='$token' AND ip='$ip'")->fetch_object();

	}
	public function getId() {
		return $this->id;
	}
	//register
	public function register($data = []) {
		$data = array_map(function($e){
			return strip_tags(db()->connect()->escape_string($e));
		}, $data);
		//check usernname 
		$user = new User();
		if ($user->usernameExists($data['username'])) {
			throw new Exception('Username sudah di daftarkan orang lain!');
		} elseif($user->emailExists($data['email'])) {
			throw new Exception('Email sudah di daftarkan orang lain!');
		}

		$password = password_hash($data['password'], PASSWORD_DEFAULT);
		$sql = sprintf("INSERT INTO `tb_pengguna`(`username`, `password`, `email`, `id_akses`,`confirmation`) VALUES ('%s','%s','%s',
			'%s','N')", $data['username'],$password,$data['email'],$data['sebagai']);
		if (db()->query($sql)) {
			return true;
		} else {
			return false;
		}
	} 
}