<?php
include('../bd/crud.php');
include('../bd/conexao.php');

if(isset($_POST['funcao'])){

    $funcao = $_POST['funcao'];

    switch ($funcao){
        case 'buscar_funcionario':
            if (empty($_POST['pesquisa'])){
                $funcionarios = busca_varios($conexao, "situacao = 1" , 'funcionario');
            }else {
                $pesquisa = $_POST['pesquisa'];
                $funcionarios = busca_varios($conexao, "situacao = 1 and nome LIKE '%{$pesquisa}%'" , 'funcionario');
            }

            if($funcionarios != null){
                print json_encode($funcionarios);
            }

            break;
        default:
            break;
    }

}

?>