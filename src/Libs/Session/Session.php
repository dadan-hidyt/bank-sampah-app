<?php
namespace Libs\Session;
class Session {
    public function __construct()
    {
        session_name('__sgc__d');
        $cookie_param = session_get_cookie_params();
        session_set_cookie_params($cookie_param['lifetime'],$cookie_param['path'],$cookie_param['domain'],$cookie_param['secure'],true);
        session_start();
        if(session_status() == 1) {
            session_start();
        }
    }
    public function set($name, $value = null) {
        if(is_array($name)) {
            foreach ($name as $key => $value) {
                $_SESSION[$key] = $value;
            }
            return true;
        } else {
            return $_SESSION[$name] = $value;
        }
    }
    public function has($name) {
        return $_SESSION[$name] ?? false;
    }
    public function get($name) {
        if($this->has($name)) {
            return $_SESSION[$name];
        }
    }
    public function flashDanger($key = '',$message = '') {
        if (isset($_SESSION['__flash'][$key])) {
            unset($_SESSION['__flash'][$key]);
        } 
        $_SESSION['__flash'][$key] = sprintf('<p class="alert alert-danger">%s</p>', $message);
    }
    public function flashWarning($key = '',$message = '') {
        if (isset($_SESSION['__flash'][$key])) {
            unset($_SESSION['__flash'][$key]);
        } 
        $_SESSION['__flash'][$key] = sprintf('<p class="alert alert-warning">%s</p>', $message);
    }
    public function flash($key = '',$message = '') {
        if (isset($_SESSION['__flash'][$key])) {
            unset($_SESSION['__flash'][$key]);
        } 
        $_SESSION['__flash'][$key] = $message;
    }
    public function flashSuccess($key = '',$message = '') {
        if (isset($_SESSION['__flash'][$key])) {
            unset($_SESSION['__flash'][$key]);
        } 
        $_SESSION['__flash'][$key] = sprintf('<p class="alert alert-success">%s</p>', $message);
    }

    public function getFlash($name) {
     if(!isset($_SESSION['__flash'][$name])) {
      return;
  } 
  $message = $_SESSION['__flash'][$name];
  unset($_SESSION['__flash'][$name]);
  return $message;
}
public function flasHas($name) {
    return ($_SESSION['__flash'][$name] ?? true) ? true : false;
}
public function unset($name) {
  unset($_SESSION[$name]);
}
public function destroy() {
    session_unset();
    session_destroy();
}


}
