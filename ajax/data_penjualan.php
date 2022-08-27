<?php require '../src/init.php';
header("Content-Type:application/json");
$type = $_GET['type'] ?? null;
$user_id = core()->user->getId();
if(core()->auth->isLogin() === false) {
   $response = [
		'code' => 204,
		'status' => false,
		'message' => 'Di butuhkan login terlebih dahulu!',
	];
	echo json_encode($response);
}

if (empty($type)) {
	$response = [
		'code' => 204,
		'status' => false,
		'message' => 'Opps something wen wrong!',
	];
	//response 204
	echo json_encode($response);
	exit;
}

switch (strip_tags($type)) {
	case 'add':
		
	$data = core()->request->post();
	if(empty($data)) {
		$response = [
			'code' => 201,
			'status' => false,
			'message' => 'Tidak ada data yang di kirim!',
		];
	} else {
		$nama = $data['nama'];
		$harga = $data['harga'];
		$deskripsi = $data['deskripsi'];
		$satuan = $data['satuan'];
		$insert = db()->query("INSERT INTO `tb_produkjual`(`id_pengguna`, `nama`, `harga`, `harga_lama`, `satuan`, `status`, `deskripsi`) VALUES ('$user_id','$nama','$harga','0','$satuan','null','$deskripsi')");
		if($insert) {
			$response = [
			'code' => 200,
			'status' => true,
			'message' => 'Data berhasil di tambahkan!',
		];
		} else {
			$response = [
				'code' => 204,
				'status' => false,
				'message' => 'Opps something wen wrong!',
			];
		}
	}
	if (isset($response) && !empty($response)) {
		echo json_encode($response);
	}
		break;
	case 'result':
		$response_data = [
			'data' => []
		];
		$data = db()->query("SELECT * FROM tb_produkjual WHERE id_pengguna='$user_id'");
		$id = 0;
		while($result = $data->fetch_assoc()) {
			$id++;
			$response_data['data'][] = [
				$id,
				$result['nama'],
				$result['satuan'],
				'IDR '.formatRupiah((int)$result['harga']),
				$result['harga_lama'],
				$result['deskripsi'],
				'
					<button data_id=\''.$result['id_produkjual'].'\'>Hapus</button>
					<button>Edit</button>
				'
			];
		}
		echo json_encode($response_data);
	break;
	default:
		// code...
		break;
}