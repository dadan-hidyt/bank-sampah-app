<?php

require 'src/init.php';

//login

$menu = core()->menu_akses;
$menu->setAkses(1);
$menu->getMenu();
exit();
view('index','layout.general',['title'=>'index','body_class'=>'dadab']);

?>