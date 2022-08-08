<?php
defined('ROOT_PATH') OR exit('Tidak dapat mengakses secara direct ke sini!');
/**
 * global configuration
 * DB
 * SITE
 * */
define('CONFIG',array(
	'DB' => array(
		'HOST'		=>	'localhost',
		'USER'		=>	'root',
		'PASS'		=> '',
		'DB'		=>	'sampah_kita',
		'CHARSET'	=>	'utf8mb4'
	),
	'SITE' => array(
		'TITLE' => 'sampahkita',
		'URL' => isset($_SERVER['HTTPS']) ? 'https://' : 'http://'.$_SERVER['HTTP_HOST'].'/myproject/bank-sampah-app/',//url
		'FAVICON' => 'default.ico',
	),
));
?>