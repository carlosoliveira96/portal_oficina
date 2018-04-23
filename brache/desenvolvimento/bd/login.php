<?php

include("conexao.php");

function login($conexao,$login, $senha) {
    $query = "select a.*, b.* from login a , funcionario b where a.login='{$login}' and a.senha='{$senha}' and a.login = b.login_login";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    mysqli_close($conexao);
    return $usuario;
}


function logaUsuario($usuario) {

   $_SESSION["usuarioLogado"] = true;
   $_SESSION["perfilUsuario"] = $usuario['perfil_id'];
   $_SESSION["usuario"] = $usuario['login'];
   $_SESSION["meu_id_funcionario"] = $usuario['id'];
   $_SESSION['img_usurio'] = $usuario['url_imagem'];
   $_SESSION['cargo'] = $usuario['cargo'];
}

function logout() {
    session_destroy();
}

?>