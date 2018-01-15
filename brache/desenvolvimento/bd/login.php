<?php

include("conexao.php");

function login($conexao,$login, $senha) {
    $query = "select * from login where login='{$login}' and senha='{$senha}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    mysqli_close($conexao);
    return $usuario;
}


function logaUsuario($usuario) {
   $_SESSION["usuarioLogado"] = true;
   $_SESSION["perfilUsuario"] = $usuario['perfil_id'];
}

function logout() {
    session_destroy();
}

?>