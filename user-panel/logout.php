<?php
require '../src/init.php';

core()->auth->logout(function(){
	return redirect(base_url('login.php'));
});