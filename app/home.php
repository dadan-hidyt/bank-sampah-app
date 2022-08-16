<?php
require '../src/init.php';
$data = [];
//tabungan instance
$tabungan = new Classes\Tabungan();
/**
*history tabungan dapatkan 4 data
*/
$data['history_tabungan'] = $tabungan->history(4);
$data['penjualan'] = null;
$data['title'] = 'Homepage';
view('pages/index','layout.dashboard',$data);

?>