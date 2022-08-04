<?php
/**
 * @package Auth Page
 * @author dadan hidayat
 */

use Libs\Security;

require 'src/init.php';


$next_uri = null;
/**
 * mendapatkan next url jika ada
 */
if(isset($_GET['_next'])) {
    $next_uri = $_GET['_next'];
}
//get next uri from url
echo clean_string($next_uri);
//render login page
view('auth/login','auth',array(
    'title' => get_title('login'),
    'body_class' => 'auth'
));
?>