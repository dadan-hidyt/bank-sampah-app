<?php
include 'src/init.php';
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

	$user = new User();
	$data = [];
	try {
		$user->register($data);
	}catch(Exception $e) {

	}
}
view('auth/register_view','layout.general',
	[
		'title'=>'Daftar akun',
		'body_class' => 'auth',
	]
);