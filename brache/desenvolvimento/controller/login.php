<?php
include('../bd/login.php');
include('../bd/conexao.php');

$login = $_POST['login'];
$senha = $_POST['senha'];
$funcao = $_POST['funcao'];

$senhaMd5 = md5($senha);
session_start();
switch ($funcao) {
    case 'login':
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
