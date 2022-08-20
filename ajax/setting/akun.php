<?php
require '../../src/init.php';
header('Content-Type: application/json');
$response = [];
if (core()->request->has('profile_photo')) {
	$file = $_FILES['gambar'];
	$name = $file['name'];
	$size = $file['size'];
	$tmp = $file['tmp_name'];
	//check extension
	$extension = pathinfo($name, PATHINFO_EXTENSION);
	if (in_array(strtolower($extension),['jpg','jpeg','png','gif']) && $size < 3000000) {
		//get profile photo user from database 
		$old_photo = core()->user->getPhoto();
		$destination = ROOT_PATH.'files'.DS.'images'.DS.'avatar';
		$image_new_name = sprintf('avatar-%s-%s.%s',core()->user->getUsername(),md5(uniqid()),$extension);
		$id = core()->user->getId();
		if (db()->query("UPDATE tb_pengguna SET photo_profile ='files/images/avatar/$image_new_name' WHERE id_pengguna='$id'")) {
			if (!empty($old_photo)) {
				$old_photo = str_replace('/', DS, $old_photo);
				@unlink(ROOT_PATH.$old_photo);
			}
			upload($image_new_name,$tmp,$destination);
			$response = ['error'=>false,'msg'=>'Photo profile berhasil di update!'];
			echo json_encode($response);
		}
		die();exit();
	} else {
		$response = ['error'=>true,'msg'=>'extensi harus jpg,png,atau gif dan maxsimal upload 2MB'];
		echo json_encode($response);
		die();exit();
	}

}

?>