<?php
header_remove('X-Powered-By');
header_remove('Server');
use Libs\DB;
use Libs\Session\Session;
use Libs\View;
use Libs\Cookie;
use Libs\Security;
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
