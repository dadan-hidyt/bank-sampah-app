<?php
header_remove('X-Powered-By');
header_remove('Server');
use Libs\DB;
use Libs\Session\Session;
use Libs\View;
use Libs\Cookie;
use Libs\Security;
use Libs\Request;
require 'define.php';
/**
 * functions
 */
require 'functions.php';
/**
 * LOAD FILE
 */
load_file_src('html_functions');
load_file_src('Registry');
/**
 * load file config
 * */
if(false === is_file(ROOT_PATH.'config.php')) {
    die('Error: config is not defined');
}
require ROOT_PATH.'config.php';
/**
 * autoloader class
 */
autoloader();
/**
 * --------------------------------------
 * REGISTRY
 * --------------------------------------
 */
$registry = new Registry();
/**
 * ---------------------------------------
 * DATABASE
 * ---------------------------------------
 */
$registry->set('db', new DB);
/**
 * ---------------------------------------
 * SESSION
 * ---------------------------------------
 */
$registry->set('session', new Session);
/**
 * ---------------------------------------
 * Cookie
 * ---------------------------------------
 */
$registry->set('cookie', new Cookie);
/**
 * security
 */
$registry->set('security', new Security);

/**
 * LIBS INPUT
 */
$registry->set('request',new Request);
/**
 * CONFIG
 * */
$registry->set('config', new Config);