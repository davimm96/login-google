
<?php
//Retorna as infomações da sessão do usuário
$info = \App\Session\User::getInfo();

?>
<p>Bem-vindo <?=$info['name']?></p>
<a href="includes/logout.php">
	<button>Sair</button>
</a>