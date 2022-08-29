<?php
header('Content-Type:application/json');
include '../../src/init.php';
if (isset($_GET['type'])) {
	switch ($_GET['type']) {
		case 'add_to_cart':
		$id_barang = core()->request->post('id_barang');
		$jumlah = core()->request->post('jumlah');
		if (empty($jumlah)) {
			$jumlah = 1;
		}
		$cart = [
			'id_barang' => [
				'id_barang' => $id_barang,
				'jumlah' => $jumlah,
			],
		];

		if (!isset($_SESSION['cart']['cart_items'][$id_barang])) {
			$_SESSION['cart']['cart_items'][$id_barang] =array(
					'id_barang' => $id_barang,
					'jumlah' => $jumlah,
				);
		} else {
			if (isset($_SESSION['cart']['cart_items'][$id_barang])) {
				$_SESSION['cart']['cart_items'][$id_barang]['jumlah'] = $jumlah;
			}
		}
		echo json_encode(['status'=>true]);
		break;
		case 'get_result_cart':
		 $response_data['data'] = [];
		 if (isset($_SESSION['cart']['cart_items'])) {
		 	$sql = "SELECT * FROM tb_produkbeli WHERE ";
		 	foreach ($_SESSION['cart']['cart_items'] as $value) {
		 		if (count($_SESSION['cart']['cart_items']) < 1) {
		 			$sql .= "id_produkbeli='".$value['id_barang']."'";
		 		} else {
		 			$sql .= "id_produkbeli='".$value['id_barang']."' OR ";
		 		}
		 	}
		 	 $sql = rtrim($sql, " OR ");
			 $sql = trim($sql);
			 $result = db()->query($sql);
			 $total_harga = 0;
			 $id = 0;
			 while($data = $result->fetch_object()){
			 	$id++;
			 	$total_harga += ($data->harga * $_SESSION['cart']['cart_items'][$data->id_produkbeli]['jumlah']);
			 	$response_data['data'][] = [
			 		$id,
			 		$data->nama,
			 		'IDR '.formatRupiah($data->harga),
			 		$data->satuan,
			 		$_SESSION['cart']['cart_items'][$data->id_produkbeli]['jumlah'],
			 		'IDR '.formatRupiah($data->harga * $_SESSION['cart']['cart_items'][$data->id_produkbeli]['jumlah']),
			 	];
			 }
			$_SESSION['cart']['total_harga'] = $total_harga;
		 }

		echo json_encode($response_data);
		break;
		case "total_harga" :
			if(isset($_SESSION['cart']['total_harga'])) {
				echo formatRupiah($_SESSION['cart']['total_harga']);
			}
		break;
		default:
			// code...
			break;
	}
}