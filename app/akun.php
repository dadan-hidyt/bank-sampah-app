<?php

require '../src/init.php';

$information = [];



if (isset($_GET['data-diri'])) {
	if (isset($_GET['edit'])) {
		view('pages/data_diri_edit','layout.dashboard',['title'=>'Edit data diri']);
	} else {
		if (empty(core()->user->dataDiri())) {
			redirect('akun.php?data-diri&edit');
		}
		view('pages/data_diri','layout.dashboard',['title'=>'Data diri']);
	}
} else {
	view('pages/akun','layout.dashboard',['title'=>'Akun saya']);
}



?>