<?php
/**
 * Library cookie untuk menangani pembuatan cookie
 * @author dadan
 * @package library
 */
namespace Libs;
class Cookie {
    public function _setCookie($name,$value,$expires,$path,$domain,$secure,$http_only) {
        if (!$expires) {
            //default expires for cookie
            $expires = (time() + 60 * 60 * 24 * 30); //1 bulan
        }
        if(is_array($name)) {
          $cookie_name = $name['name'];
          $value = $name['value'];
          $expires = $name['expires'] ?? $expires;
          $path = $name['path'] ?? $path;
          $secure = $name['secure'] ?? $secure;
          $http_only = $name['http_only'] ?? $http_only;
        }
        $set = setcookie($name, $value, $expires, $path, $domain, $secure,$http_only);
        if($set) {
            return true;
        } else {
            return false;
        }
    }
    public function set($name,$value = '',$expires = 0,$path = '',$domain = '', $secure = false,$http_only = true) {
        $this->_setCookie($name,$value,$expires,$path,$domain, $secure,$http_only);
    }
    public function get($name) {
        if ($this->has($name)) {
            return $_COOKIE[$name];
        }
    }
    public function has($name) {
        return $_COOKIE[$name] ?? false;
    }
    public function destroy($name) {
        unset($_COOKIE[$name]);
    }

}
?>
