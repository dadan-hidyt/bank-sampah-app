<?php

require '../src/init.php';

if (request()->has('update_data_diri') && request()->method() === 'POST') {
	//file
	$file_ktp = $_FILES['foto_ktp'];
	$file_kk = $_FILES['foto_kk'];

	$file = [];
	//foto KK
	$file['foto_kk'] = [
		'name' => randomFileName($file_kk['name']),
		'tmp' => $file_kk['tmp_name'],
	];
	//foto KTP
	$file['foto_ktp'] = [
		'name' => randomFileName($file_ktp['name']),
		'tmp' => $file_ktp['tmp_name'],
	];
	$data['id_pengguna'] = core()->user->getId();
	// VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]')
	//amankan texs nya wkwkw sugan we berhasil
	foreach (request()->post() as $key => $value) {
		$data[$key] = db()->connect()->real_escape_string(strip_tags(htmlentities($value)));
	}
	$data['foto_ktp'] = 'files/'.core()->user->getUsername().'/'.$file['foto_ktp']['name'];
	$data['photo_kk'] = 'files/'.core()->user->getUsername().'/'.$file['foto_kk']['name'];
	$sql = sprintf("
		INSERT INTO `tb_datadiri`
		(`id_diri`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`agama`,`alamat`,`rt`,`rw`,`kelurahan_desa`,`kecamatan`,`kabupaten`,`provinsi`,`no_ktp`,`foto_ktp`,`photo_kk`) 
		VALUES
		('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$data['id_pengguna'],$data['nama_lengkap'],$data['tempat_lahir'],$data['tanggal_lahir'],$data['agama'],$data['alamat'],$data['rt'],$data['rw'],$data['kelurahan_desa'],$data['kecamatan'],$data['kabupaten'],$data['provinsi'],$data['no_ktp'],$data['foto_ktp'],$data['photo_kk']);
		//insert data 
		if (empty(core()->user->dataDiri()) && db()->connect()->query($sql)) {
			foreach ($file as $value) {
				upload($value['name'], $value['tmp'],ROOT_PATH.'files'.DS.core()->user->getUsername());
			}
			session()->flashWarning('data_diri_edited','Data berhasil di tambahkan');
			return redirect('akun.php?data-diri&edit');
		} else {
			session()->flashWarning('data_diri_edited','Data gagal di tambahkan: data sudah ada di database!');
			return redirect('akun.php?data-diri&edit');
		}
}
if (isset($_GET['data-diri'])) {
	if (isset($_GET['edit'])) {
		view('pages/data_diri_edit','layout.dashboard',['title'=>'Edit data diri']);
	} else {
		if (empty(core()->user->dataDiri())) {
			session()->flashWarning('data_diri_edited','Anda belum mengisi data diri silahkan isi terlebih dahulu!');
			redirect('akun.php?data-diri&edit');
		}
		view('pages/data_diri','layout.dashboard',['title'=>'Data diri']);
	}
} else {
	view('pages/akun','layout.dashboard',['title'=>'Akun saya']);
}

?>