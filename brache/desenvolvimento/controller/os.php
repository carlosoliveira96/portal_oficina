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
        case 'busca_os':

            $pesquisa = $_POST['pesquisa'];
            $corretor = $_POST['corretor'];
            $seguradora = $_POST['seguradora'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa" , "os a , veiculo b , cadastro c " , "a.* , b.* , c.* ");

            if($os != null){
                print json_encode($os);
            }

            break;
        default:
            break;
    }

}

?>