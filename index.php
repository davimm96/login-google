<?php
//Autoload
require __DIR__.'/vendor/autoload.php';

//Dependência
use \App\Session\User as SessionUser;

//Header
include __DIR__.'/includes/header.php';

//Corpo da página
include SessionUser::isLogged() ?
	__DIR__.'/includes/admin.php' :
	__DIR__.'/includes/login.php';

//Footer
include __DIR__.'/includes/footer.php';
?>