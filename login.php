<?php
/**
 * @package Auth Page
 * @author dadan hidayat
 */

use Libs\Security;
use Libs\Input;
require 'src/init.php';

$req = core()->request;
$auth = core()->auth;

if($auth->isLogin()) {
    redirect('user-panel/home.php');
}
/**
 * cek apakah method nya post
 * */
if($req->method() === 'POST') {

    $emailOrUsername = $req->post('email');
    $remember_me = $req->post('remember_me');
    if (!is_null($remember_me)) {
        //set remember
        $auth->isRemember(true);
    }
    $password = $req->post('password');
    $data = [
        'email' => db()->connect()->real_escape_string($emailOrUsername),
        'password' => $password,
    ];
    try {
        //proccess login
       $data = $auth->doLogin($data);
      redirect('user-panel/home.php');
    }catch(Exception $e) {
        session()->flashWarning('login_gagal_message',$e->getMessage());
        redirect('login.php');
    }

}
/** view login page */
view('auth/login','layout.general',[
    'title' => 'login',
    'body_class' => 'auth_class'
]);

?>