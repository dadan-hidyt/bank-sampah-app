<?php

use Libs\View;

if (!function_exists('app')) {
    function core()
    {
        global $registry;
        return $registry;
    }
}
if (!function_exists('query_store')) {
    function query_store()
    {
    }
}

if (!function_exists('autoload_registers')) {
    function autoload_registers($class)
    {
        /**
         * simple autoloader
         */
        $class_dir =  sprintf('%s%s.php', SRC_PATH, $class);
        if (is_file($class_dir)) {
            require_once $class_dir;
        }
    }
}

if (!function_exists('autoloader')) {
    function autoloader()
    {
        spl_autoload_register('autoload_registers');
    }
}
/***
 * --------------------------------
 * fungsi query database
 * --------------------------------
 **/
if (!function_exists('db_query')) {
    function db_query($query)
    {
        $db = core()->get('db');
        if ($db) {
            if (method_exists('db', 'query')) {
                return $db->query($query);
            }
        }
    }
}
/***
 * --------------------------------
 * fungsi untuk merender halaman
 * --------------------------------
 **/
if (!function_exists('view')) {
    function view($file, $layout = null, $data = [])
    {
        $ubah_dot = function ($string) {
            $string = trim($string, '.');
            return str_replace('.', '/', $string);
        };
        $file = $ubah_dot($file);
        $layout = $ubah_dot($layout);
        if (class_exists(View::class)) {
            // ob_start('minify_html');
            ob_start();
            $c = new View($file, $data);
            $c->set_layout($layout);
            $c->render();
        }
    }
}
/***
 * --------------------------------
 * fungsi untuk meninify kode html
 * --------------------------------
 **/
if (!function_exists('minify_html')) {
    function minify_html($str)
    {
        $str = preg_replace("/\n+/", '', $str);
        $str = preg_replace("/\t+/", '', $str);
        $str = preg_replace("/>\r+/", '>', $str);
        $str = preg_replace("/\r+</", '<', $str);
        $str = preg_replace("/>\s+</", '><', $str);
        return $str;
    }
}
if (!function_exists('load_file')) {
    function load_file_src($filename)
    {
        $file = SRC_PATH . $filename . '.php';
        if (is_file($file)) {
            require $file;
        }
    }
}
if (!function_exists('get_title')) {
    function get_title($title, $surfix = false, $separator = ' | ')
    {
        $app_name = core()->config->get('SITE')->TITLE;
        if ($surfix) {
            return $title . $separator . $app_name;
        }
        return $title;
    }
}

if (!function_exists('clean_string')) {
    function clean_string($string)
    {
        return core()->security::clean_string($string);
    }
}

function base_url($path = null)
{
    if ($path) {
        return core()->config->get('SITE')->URL . $path;
    }
    return core()->config->get('SITE')->URL;
}
function session()
{
    return core()->session;
}
//create breadcroumb
function create_breadcrumb($data = [])
{
    if (!empty($data)) {
        $content = '
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">';
        if (count($data) > 0) {
            $content .= '<li class="breadcrumb-item">
                    <a href=\'home.php\'>Dashboard</a>
                </li>';
        }
        foreach ($data as $link => $value) {

            if (end($data) === $value) {
                $content .= '<li class="breadcrumb-item active" aria-current="page">' . $value . '</li>';
            } else {
                $content .= '<li class="breadcrumb-item">
                <a href=\'' . $value . '\'>' . $link . '</a>
            </li>';
            }
        }
    }
    $content .= '
        </ol>
    </nav>';
    echo $content;
}
function db()
{
    return core()->db;
}
function toObject($array = [])
{
    $std = new StdClass();
    foreach ($array as $ar => $value) {
        $std->{$ar} = $value;
        if (is_array($value)) {
            $std->{$ar} = toObject($value);
        }
    }
    return $std;
}

function toArray(object $object) {
    $array = [];
    foreach($object as $obj => $v) {
        $array[$obj] = $v;
        if (is_object($v)) {
            $array[$obj] = $v;
        }
    }
    return $array;
 }

 function redirect($to) {
    header('location: '.$to);
    exit;
 }
 function cookie() {
    return core()->cookie;
 }
 function request(){
    return core()->request;
 }
function randomFileName($filename)  {
    $ext = '.'.pathinfo($filename,PATHINFO_EXTENSION);
    return uniqid().time().md5(rand()).$ext;
}
 function upload($filename,$tmp,$dir) {
   if (is_dir($dir) || !is_file($dir)) {
       @mkdir($dir);
   }
   if (move_uploaded_file($tmp, $dir.DS.$filename)) {
       return true;
   }
   return false;
 }