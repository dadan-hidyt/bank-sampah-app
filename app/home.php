<?php
require '../src/init.php';

$data = [];

//data history tabungan

$id = core()->user->getId();

$run_query = db()->query("SELECT * FROM tb_tabungan WHERE id_pengguna='$id' LIMIT 4");
$history = [];
if ($run_query) {
	while ($datas = $run_query->fetch_assoc()) {
	    $history[] = $datas;
	}
}

$data['history_tabungan'] = $history;
$data['title'] = 'Homepage';
view('pages/index','layout.dashboard',$data);

?>