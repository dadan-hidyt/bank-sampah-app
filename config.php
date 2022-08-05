<?php
defined('ROOT_PATH') OR exit('Tidak dapat mengakses secara direct ke sini!');
define('CONFIG',array(
	'DB' => array(
		'HOST'		=>	'localhost',
		'USER'		=>	'root',
		'DB'		=>	'bank_sampah',
		'CHARSET'	=>	'utf8mb4'
	),
	'SITE' => array(
		'TITLE' => 'sampahkita',
		'URL' => isset($_SERVER['HTTPS']) ? 'https://' : 'http://'.$_SERVER['HTTP_HOST'].'/myproject/bank-sampah-app/',//url
		'FAVICON' => 'default.ico',
	),
));
?>