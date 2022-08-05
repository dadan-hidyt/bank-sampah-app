<?php
include '../src/init.php';

/**
 * halmaan menampilkan laporan penjualan
 */
$user_id = 83;

view('pages/penjualan','layout.dashboard',[
    'title' => 'penjualan',
]);