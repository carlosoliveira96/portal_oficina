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
        case 'buscar_os':
            
            $os =  busca_detalhada_um($conexao, "a.cliente_id = 2 AND a.cliente_id = b.id AND a.veiculo_placa = c.placa AND a.corretor_id = b1.id AND a.seguradora_id = b2.id" , 'os a, cadastro b, veiculo c, cadastro b1, cadastro b2', 'a.*, b.*, c.*, b.nome as nome_cliente, b1.nome as nome_corretor_f, b1.nome_fantasia as nome_corretor_j, b2.nome as nome_seguradora_f, b2.nome_fantasia as nome_seguradora_j');

            if($os != null){
                print json_encode($os);
            }
            
            break;
        case 'busca_os':

            $pesquisa = $_POST['pesquisa'];
            $corretor = $_POST['corretor'];
            $seguradora = $_POST['seguradora'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa" , "os a , veiculo b , cadastro c ");

            if($os != null){
                print json_encode($os);
            }

            break;
        default:
            break;
    }

}

?>