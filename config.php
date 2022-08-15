<?php
defined('ROOT_PATH') OR exit('Tidak dapat mengakses secara direct ke sini!');
/**
 * global configuration
 * DB
 * SITE
 * */
$url = $_SERVER['HTTP_HOST'] == 'banksampah.test' ? '' : 'myproject/bank-sampah-app/';
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
		'URL' => isset($_SERVER['HTTPS']) ? 'https://' : 'http://'.$_SERVER['HTTP_HOST'].'/'.$url,//url
		'FAVICON' => 'default.ico',
	),
));
?>