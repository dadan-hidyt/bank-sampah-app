<?php

require 'src/init.php';
view('index','layout.general',['title'=>'index','body_class'=>'dadab']);

db()->query("SELECT * FROM tb_pengguna","SELECT * FROM tb_pengguna");
echo db()->query_error;

?>