<?php require '../../src/init.php';
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
		$insert = db()->query("INSERT INTO `tb_produkbeli`(`id_pengguna`, `nama`, `harga`, `harga_lama`, `satuan`, `status`, `deskripsi`) VALUES ('$user_id','$nama','$harga','0','$satuan','null','$deskripsi')");
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
		$data = db()->query("SELECT * FROM tb_produkbeli WHERE id_pengguna='$user_id'");
		$id = 0;
		while($result = $data->fetch_assoc()) {
			$id++;
			if($result['harga_lama'] != 0) {
				if($result['harga'] > $result['harga_lama']) {
					$harga =	sprintf('<span style="color:green;font-weight:bold;">IDR %s</span>',formatRupiah((int)$result['harga']));
				} elseif($result['harga'] == $result['harga_lama']) {
						$harga =	sprintf('<span style="color:black;font-weight:bold;">IDR %s</span>',formatRupiah((int)$result['harga']));
				} else {
					$harga =	sprintf('<span style="color:red;font-weight:bold;">IDR %s</span>',formatRupiah((int)$result['harga']));
				}
			} else {
				$harga =	sprintf('<span style="color:black;font-weight:bold;">IDR %s</span>',formatRupiah((int)$result['harga']));
			}
			$response_data['data'][] = [
				$id,
				$result['nama'],
				$result['satuan'],
				$harga,
				empty($result['harga_lama']) ? 'N/A' : sprintf('<strong>IDR %s</strong>', formatRupiah((int)$result['harga_lama'])),
				$result['deskripsi'],
				'
					<button id="button_delete_table" class="btn btn-danger btn-sm" data_id=\''.$result['id_produkbeli'].'\'>Hapus</button>
					<button class="btn btn-success btn-sm" id="button_edit_table" data_id=\''.$result['id_produkbeli'].'\'>Edit</button>
				'
			];
		}
		echo json_encode($response_data);
	break;
	case 'delete' :
		$id = core()->request->get('id');
		if (db()->query("DELETE FROM tb_produkbeli WHERE id_produkbeli='$id' AND id_pengguna='$user_id'")) {
			$response = [
				'code' => 200,
				'status' => true,
				'message' => 'Data berhail di hapus!',
			];
		} else {
			$response = [
				'code' => 204,
				'status' => false,
				'message' => db()->query_error,
			];
		}
		echo json_encode($response);
		break;
	case 'get_data_by_id':
		$id = core()->request->get('id');
		$data = db()->query("SELECT * FROM tb_produkbeli WHERE id_produkbeli='$id'");
		echo db()->query_error;
		$response = [
			'code' => 200,
			'status' => true,
			'data' => $data->fetch_assoc(),
		];
		echo json_encode($response);
		break;
	case 'edit':
		$id = core()->request->get('id');
		if (empty($id)) {
			return false;
		}
		$data = core()->request->post();
		if (empty($data)) {
			return false;
		}
		$result = db()->query("SELECT * FROM tb_produkbeli WHERE id_produkbeli='$id'");
		if ($result && $result->num_rows > 0) {
			$fetch = $result->fetch_object();
			if (!empty($data['harga'])) {
				$harga_lama = $fetch->harga;
				$harga_baru = $data['harga'];
			} else {
				$harga_lama = 0;
				$harga_baru = $fetch->harga;
			}
			if (db()->query("UPDATE tb_produkbeli SET nama='$data[nama]', harga='$harga_baru',harga_lama='$harga_lama', satuan='$data[satuan]',deskripsi='$data[deskripsi]' WHERE id_produkbeli='$id'")) {
				$response = [
					'code' => 200,
					'status' => true,
					'message' => "data berhasil di update",
				];
				echo json_encode($response);exit;die();
			}
		}
			$response = [
				'code' => 204,
				'status' => false,
				'message' => 'data gagal di update!',
			];
			echo json_encode($response);
		
		break;
	default:
		// code...
		break;
}