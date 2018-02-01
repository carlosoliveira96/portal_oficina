<?php
include "../bd/conexao.php";
include "../bd/crud.php";

if (isset($_POST['funcao'])){
    $funcao = $_POST['funcao'];
    switch ($funcao){
        case 'busca_funcionario':

            $id = $_POST['funcionario_id'];
            $funcionario = busca_detalhada_um($conexao, "id = {$id}" , 'funcionario' );

            if ($funcionario!= null){
                print json_encode($funcionario);
            }else{
                die();
            };

            break;
        case 'busca_servicos_funcionario':

            $pesquisa = $_POST['pesquisa'];
            $id = $_POST['funcionario_id'];

            $servicos = busca_detalhada_varios($conexao, "b.funcionario_id = '{$id}' and a.id = b.servico_id and a.descricao LIKE '%{$pesquisa}%' " , "servico a , servico_funcionario b " , "a.*");

            if($servicos != null){
                print json_encode($servicos);
            }

            break;
        case 'busca_servicos':

            $pesquisa = $_POST['pesquisa'];
            $id = $_POST['funcionario_id'];

            $servicos_funcionario = busca_detalhada_varios($conexao, "funcionario_id = '{$id}'" , 'servico_funcionario' );

            if($servicos_funcionario != null){

                $servicos = busca_detalhada_varios($conexao, "b.funcionario_id = '{$id}' and a.id NOT IN (SELECT c.servico_id FROM servico_funcionario c where c.funcionario_id = '{$id}') and a.descricao LIKE '%{$pesquisa}%' GROUP BY a.id" , "servico a , servico_funcionario b " , "a.*");

                if($servicos != null){
                    print json_encode($servicos);
                }

            }else{

                $servicos = busca_varios($conexao, " situacao = 1 and descricao LIKE '%{$pesquisa}%' " , 'servico');
                
                if($servicos != null){
                    print json_encode($servicos);
                }

            }
            
            break;
        case 'adiciona_servico':
            $servico_id = $_POST['servico_id'];
            $funcionario_id = $_POST['funcionario_id'];

            $servico_funcionario = insere($conexao, "servico_id , funcionario_id" , " '{$servico_id}' , '{$funcionario_id}' " , "servico_funcionario"); 
            
            if (strlen($servico_funcionario['id']) <= 0 ) {
                print json_encode($servico_funcionario);
            }

            break;
        case 'exclui_servico':

            $servico_id = $_POST['servico_id'];
            $funcionario_id = $_POST['funcionario_id'];

            $servico_funcionario = deleta($conexao , 'servico_funcionario ' , "servico_id = '{$servico_id}' and funcionario_id = '{$funcionario_id}'");

            if (strlen($servico_funcionario['id']) <= 0 ) {
                print json_encode($servico_funcionario);
            }

            break;
    }
}

?>