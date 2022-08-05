<?php
/**
 * @package Auth Page
 * @author dadan hidayat
 */

use Libs\Security;
use Libs\Input;
require 'src/init.php';

$req = core()->request;
/**
 *cek apakah method nya adalah post 
 **/
if ($req->method() === 'POST' || $req->method() === 'post') {
   $submit_login = $_POST['login'] ?? false;
   if ($submit_login) {
        $username = $req->post('username');
        $password = $req->post('password');
        $remember_me = $req->post("remember");
   }

}
/** view login page */
view('auth/login','layout.general',[
    'title' => 'login',
    'body_class' => 'auth_class'
]);

?>