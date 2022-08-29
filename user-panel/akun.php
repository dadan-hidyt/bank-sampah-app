<?php

require '../src/init.php';
//update data diri action
if (request()->has('tambah_data_diri') && request()->method() === 'POST') {
	core()->user->setDataDiri();
} elseif(request()->has('update_data_diri') && request()->method() === 'POST') {
	core()->user->updateDataDiri();
}
//data diri
if (isset($_GET['data-diri'])) {
	if (isset($_GET['edit'])) {
		view('pages/data_diri_edit_view','layout.dashboard',['title'=>'Edit data diri']);
	} else {
		if (empty(core()->user->dataDiri())) {
			session()->flashWarning('data_diri_edited','Anda belum mengisi data diri silahkan isi terlebih dahulu!');
			redirect('akun.php?data-diri&edit');
		}
		view('pages/data_diri_view','layout.dashboard',['title'=>'Data diri']);
	}
}elseif(isset($_GET['security_update']) && request()->method() == 'POST') {
	$new_password = request()->post('password');
	$repeat_password = request()->post('repeat_password');
	if(!empty($new_password) && !empty($repeat_password)) {
		$data = ['password'=>$new_password,'repeat_password'=>$repeat_password];
		if($repeat_password != $new_password) {
			session()->flashWarning('security_update','Password tidak sama dengan yang dketikan sebelumnya!');
			redirect('akun.php#security');
		}
		$user = new User();
		try {
			$user->updatePassword($new_password);
			session()->flashSuccess('security_update','Password berhasil di update!');
			redirect('akun.php#security');
		} catch (Exception $e) {
			session()->flashWarning('security_update',$e->getMessage());
			redirect('akun.php#security');
		}
	} else {
		redirect('akun.php');
	}
} else {
	view('pages/akun_view','layout.dashboard',['title'=>'Akun saya']);
}

?>	

