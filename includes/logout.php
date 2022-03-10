<?php
//Autoload
require __DIR__.'/../vendor/autoload.php';

//Dependências
use \App\Session\User;

//Desloga
User::logout();

//Redireciona o usuário para home
header("Location: ../index.php");
exit;