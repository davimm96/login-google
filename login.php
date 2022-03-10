<?php
//Autoload
require __DIR__.'/vendor/autoload.php';

//Dependências
use Google\Client as GoogleClient;
use \App\Session\User;

//Verifica os campos obrigatorios
if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
	header('location: index.php');
	exit;
}

$cookie = $_COOKIE['g_csrf_token'] ?? '';

//Verifica o valor do cookie e do post para csrf
if($_POST['g_csrf_token'] != $cookie){
	header('location: index.php');
}

//Validação secundaria do token
//Instãcia do cliente google
$client = new GoogleClient(['client_id' => '1032696212907-1k0v2e1u4frqk17a6o59mi2it3jl2ken.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend

//Contem os dados do usuario com base no jwt
$payload = $client->verifyIdToken($_POST['credential']);

//Verifica os dados do payload
if(isset($payload['email'])){
	User::login($payload['name'],$payload['email']);
    header('location: index.php');
    exit();
} 

die('Problemas ao consultar api');