<?php
require '../src/init.php';

$data_member = [];

$query = db()->query("SELECT tb_pengguna.id_pengguna,tb_datadiri.nama_lengkap, tb_pengguna.username, tb_datadiri.kelurahan_desa,tb_datadiri.no_ktp FROM tb_pengguna LEFT JOIN tb_datadiri ON tb_datadiri.id_diri=tb_pengguna.id_pengguna INNER JOIN tb_akses USING(id_akses) WHERE tb_akses.nama_akses='member' ");
while($data = $query->fetch_assoc()) {
    $data_member[] = $data;
}


//data produk jual
$id = core()->user->getId();

$data_produk_beli = [];

$query = db()->query("SELECT * FROM tb_produkbeli WHERE id_pengguna='$id'");
while ($data = $query->fetch_assoc()) {
	$data_produk_beli[] = $data;
}

view('pages/add_transaksi_beli_view','layout.dashboard', ['title'=>'Add transaksi','data_member'=>$data_member,'produk'=>$data_produk_beli]);
?>