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

function formatRupiah($int) {
    return number_format($int, 0, ',','.');
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
        <nav aria-label="breadcrumb" class="rounded breadcroumb shadow-sm">
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
  if (is_array($array)) {
    $std = new StdClass();
    foreach ($array as $ar => $value) {
        $std->{$ar} = $value;
        if (is_array($value)) {
            $std->{$ar} = toObject($value);
        }
    }
    return $std;
}
}
function formatSize($size,$str = false) {
    $unit = ['B','KB','MB',"GB","TB",'PB'];
    $i = 0;
    while (1024 < $size) {
        $size /= 1024;
        $i++;
    }
    if ($str === false) {
       return (int) ceil($size);
   }
   return (string) ceil($size).' '.$unit[$i];
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

function checkAkses() {
    $aks = [];
    $akses = core()->user->getAkses();
    $menu = db()->query("SELECT
        tb_menu.link
        FROM
        tb_menu_akses
        INNER JOIN tb_akses ON tb_menu_akses.akses_id = tb_akses.fungsi_akses
        INNER JOIN tb_menu ON tb_menu.id_menu = tb_menu_akses.id_menu
        WHERE
        tb_akses.nama_akses = '".$akses."' AND tb_menu.active='Y'");
    while ($data = $menu->fetch_assoc()) {
        $aks[] = $data['link'];
    }
    $aks[] = 'home.php';
    $aks[] = 'logout.php';
    if (!in_array(basename($_SERVER['SCRIPT_NAME']),$aks)) {
      redirect('home.php');
  } 
}


function get_ip() {
    if(isset($_SERVER['HTTP_X_FORWADED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWADED_FOR'];
    } else {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    }
    return $ip;
}

function getBrowser() {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $browsers = array(
        'OPR'           => 'Opera',
        'Flock'         => 'Flock',
        'Edge'          => 'Microsoft Edge',
        'Edg'           => 'Microsoft Edge',
        'Chrome'        => 'Chrome',
        'Opera.*?Version' => 'Opera',
        'Opera'         => 'Opera',
        'MSIE'          => 'Internet Explorer',
        'Internet Explorer' => 'Internet Explorer',
        'Trident.* rv'  => 'Internet Explorer',
        'Shiira'        => 'Shiira',
        'Firefox'       => 'Firefox',
        'Chimera'       => 'Chimera',
        'Phoenix'       => 'Phoenix',
        'Firebird'      => 'Firebird',
        'Camino'        => 'Camino',
        'Netscape'      => 'Netscape',
        'OmniWeb'       => 'OmniWeb',
        'Safari'        => 'Safari',
        'Mozilla'       => 'Mozilla',
        'Konqueror'     => 'Konqueror',
        'icab'          => 'iCab',
        'Lynx'          => 'Lynx',
        'Links'         => 'Links',
        'hotjava'       => 'HotJava',
        'amaya'         => 'Amaya',
        'IBrowse'       => 'IBrowse',
        'Maxthon'       => 'Maxthon',
        'Ubuntu'        => 'Ubuntu Web Browser'
    );
    foreach ($browsers as $key => $value) {
        if (preg_match('|'.$key.'.*?([0-9\.]+)|i', $agent,$match)) {
            return toObject([
                'browser' => $value,
                'version' => $match[1],
            ]);
        }
    }
    return toObject([
        'browser' => 'Unknown',
        'version' => 'Unknown',
    ]); 

}

function getPlatform() {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $platforms = array(
        'windows nt 10.0'   => 'Windows 10',
        'windows nt 6.3'    => 'Windows 8.1',
        'windows nt 6.2'    => 'Windows 8',
        'windows nt 6.1'    => 'Windows 7',
        'windows nt 6.0'    => 'Windows Vista',
        'windows nt 5.2'    => 'Windows 2003',
        'windows nt 5.1'    => 'Windows XP',
        'windows nt 5.0'    => 'Windows 2000',
        'windows nt 4.0'    => 'Windows NT 4.0',
        'winnt4.0'          => 'Windows NT 4.0',
        'winnt 4.0'         => 'Windows NT',
        'winnt'             => 'Windows NT',
        'windows 98'        => 'Windows 98',
        'win98'             => 'Windows 98',
        'windows 95'        => 'Windows 95',
        'win95'             => 'Windows 95',
        'windows phone'     => 'Windows Phone',
        'windows'           => 'Unknown Windows OS',
        'android'           => 'Android',
        'blackberry'        => 'BlackBerry',
        'iphone'            => 'iOS',
        'ipad'              => 'iOS',
        'ipod'              => 'iOS',
        'os x'              => 'Mac OS X',
        'ppc mac'           => 'Power PC Mac',
        'freebsd'           => 'FreeBSD',
        'ppc'               => 'Macintosh',
        'linux'             => 'Linux',
        'debian'            => 'Debian',
        'sunos'             => 'Sun Solaris',
        'beos'              => 'BeOS',
        'apachebench'       => 'ApacheBench',
        'aix'               => 'AIX',
        'irix'              => 'Irix',
        'osf'               => 'DEC OSF',
        'hp-ux'             => 'HP-UX',
        'netbsd'            => 'NetBSD',
        'bsdi'              => 'BSDi',
        'openbsd'           => 'OpenBSD',
        'gnu'               => 'GNU/Linux',
        'unix'              => 'Unknown Unix OS',
        'symbian'           => 'Symbian OS'
    );
    foreach ($platforms as $key => $value) {
        if (preg_match('|'.$key.'|i', $agent)) {
            return $value;
        }
    }
    return 'Unknown';
}

function createInvoice($type = 'JB') {
    $invoice = strtoupper(sprintf('TRX-%s%0d%s%s',$type,core()->user->getId(),date('mY',time()),md5(uniqid())));
    return substr($invoice, 0,30);
}
