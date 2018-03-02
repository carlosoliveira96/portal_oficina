<?php
include('../bd/crud.php');
include('../bd/conexao.php');

if(isset($_POST['funcao'])){

    $funcao = $_POST['funcao'];

    switch ($funcao){
        case 'buscar_servicos':

            $pesquisa = $_POST['pesquisa'];

            $servicos = busca_varios($conexao, "situacao = 1 and descricao LIKE '%{$pesquisa}%'" , 'servico');

            if($servicos != null){
                print json_encode($servicos);
            }

            break;
        case 'busca_empresas':
            
            $empresas = busca_todos($conexao, 'empresa');

            if($empresas != null){
                print json_encode($empresas);
            }

            break;
        case 'busca_funcionarios':
            
            $id = $_POST['servico_id'];
            $pesquisa = '';

            $funcionarios = busca_detalhada_varios($conexao, "b.servico_id = '{$id}' and a.id = b.funcionario_id and a.nome LIKE '%{$pesquisa}%'" , "funcionario a , servico_funcionario b" , "a.*");
        
            if($funcionarios != null){
                print json_encode($funcionarios);
            }

            break;
        default:
            break;
    }

}

?>