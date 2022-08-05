<?php

require 'src/init.php';

core()->cookie->set(['name'=>'login','value'=>'dadan']);

view('index','layout.general',['title'=>'index','body_class'=>'dadab']);

?>