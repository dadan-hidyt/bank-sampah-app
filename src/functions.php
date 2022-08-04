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

if(!function_exists('autoloader')) {
    function autoloader() {
        spl_autoload_register('autoload_registers');
    }
}
/***
 * --------------------------------
 * fungsi query database
 * --------------------------------
 **/ 
if(!function_exists('db_query')) {
    function db_query($query) {
        $db = core()->get('db');
        if($db) {
            if(method_exists('db','query')) {
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
if(!function_exists('view')) {
    function view($file, $layout = null, $data = []) {
        if (class_exists(View::class)) {
            ob_start('minify_html');
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
    function minify_html($str) {
          $str = preg_replace("/\n+/",'',$str);
        $str = preg_replace("/\t+/",'',$str);
        $str = preg_replace("/>\r+/",'>',$str);
        $str = preg_replace("/\r+</",'<',$str);
        $str = preg_replace("/>\s+</",'><',$str);
        return $str;
    }
}
if(!function_exists('load_file')) {
    function load_file_src($filename) {
        $file = SRC_PATH.$filename.'.php';
        if(is_file($file)) {
            require $file;
        }
    }
}
if(!function_exists('get_title')) {
    function get_title($title, $surfix = false, $separator = ' | ') {
        $app_name = 'dadan';
        if($surfix) {
            return $title.$separator.$app_name;
        }
        return $title;
    }
}

if(!function_exists('clean_string')) {
    function clean_string($string) {
        return core()->security::clean_string($string);
    }
}