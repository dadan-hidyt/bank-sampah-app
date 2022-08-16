<?php
include '../src/init.php';

/**
 * halmaan menampilkan laporan penjualan
 */
$user_id = 83;

view('pages/penjualan_view','layout.dashboard',[
    'title' => 'penjualan',
]);