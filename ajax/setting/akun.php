<?php 

require '../../src/init.php';
header('Content-Type: application/json');
$response = [];
if (core()->request->has('profile_photo')) {
	$file = $_FILES['gambar'];
	$name = $file['name'];
	$size = $file['size'];
	$tmp = $file['tmp_name'];

	$extension = pathinfo($name, PATHINFO_EXTENSION);
	if (in_array(strtolower($extension),['jpg','jpeg','png','gif'])) {
		$response = ['error'=>false,'msg'=>'Upload data berhasil!'];
		echo json_encode($response);
		die();exit();
	} else {
		$response = ['error'=>true,'msg'=>'extensi harus jpg,png,atau gif'];
		echo json_encode($response);
		die();exit();
	}

}

 ?>