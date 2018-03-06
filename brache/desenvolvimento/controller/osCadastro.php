<?php
include('../bd/crud.php');
include('../bd/conexao.php');

if(isset($_POST['funcao'])){

    $funcao = $_POST['funcao'];

    switch ($funcao){
        case 'buscar_servicos':

            $pesquisa = $_POST['pesquisa'];

            $servicos = busca_detalhada_varios($conexao, " a.id  IN (SELECT c.servico_id FROM servico_funcionario c ) and a.descricao LIKE '%{$pesquisa}%' GROUP BY a.id" , "servico a , servico_funcionario b " , "a.*");

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
        case 'busca_placa':
            $placa = $_POST['placa'];

            $resultado_placa = busca_detalhada_varios($conexao, "a.veiculo_placa = c.placa AND a.cliente_id = b.id AND  a.veiculo_placa LIKE '%{$placa}%' ORDER BY a.veiculo_placa" , "cliente_veiculo a , cadastro  b , veiculo c" , "a.* , b.* , c.*" );

            print json_encode($resultado_placa);

            break;
        default:
            break;
    }

}

?>