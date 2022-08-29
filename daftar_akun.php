<?php
/**
 * @author dadan hiadayat
 * @package autentikasi
 **/
include 'src/init.php';
if(core()->auth->isLogin()) {
    redirect('user-panel/home.php');
}
$request = core()->request;
if ($request->method() === "POST" && $request->has('daftar')) {
	$error = null;
	foreach ($request->post() as $key => $value) {
		if ($value === '' && $key !== 'daftar') {
			$error .= '<p class="alert alert-danger">'.preg_replace("/[^a-zA-Z0-9]/", ' ', $key).' tidak boleh kosong!</p>';
		}
	}
	//if error
	if (!empty($error)) {
		session()->flash('register_gagal_message', $error);
		redirect('daftar_akun.php');
	}
	//auth instance
	$user = new Auth();
	//data from post
	$data = $request->post();
	try {
		unset($data['daftar']);
		if ($data['konfirmasi_password'] != $data['password']) {
			throw new Exception("password harus sama dengan yang sebelumnya!");
		}
		$user->register($data);
		//jika pendafraran berhasil arahkan ke halaman login
		session()->flashWarning('login_gagal_message', "Pendaftaran akun berhasil silahkan login dan lengkapi data!");
		redirect('login.php');
	}catch(Exception $e) {
		session()->flashWarning('register_gagal_message', $e->getMessage());
		redirect('daftar_akun.php');
	}
}
//render view
view('auth/register_view','layout.general',
	[
		'title'=>'Daftar akun',
		'body_class' => 'auth',
	]
);