<?php
include('../bd/login.php');
include('../bd/conexao.php');


$funcao = $_POST['funcao'];

session_start();
switch ($funcao) {
	case 'login':
	
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$senhaMd5 = md5($senha);

        $usuario = login($conexao, $login, $senhaMd5);
		if ($usuario['login']) {
		    logaUsuario($usuario);
		    print "1";
		} else {
			print "0";
        }
        
		break;
	case 'logout':
        logout();
        break;
	default:
		header("Location:../views/index.php");
		break;
}

?>
