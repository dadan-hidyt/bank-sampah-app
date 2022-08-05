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
    public function unset($name) {
      unset($_SESSION[$name]);
    }
    public function destroy() {
        session_unset();
        session_destroy();
    }


}
