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
            $os =  busca_detalhada_um($conexao, "a.cliente_id = 1 AND a.cliente_id = b.id AND a.veiculo_placa = c.placa AND a.corretor_id = b1.id AND a.seguradora_id = b2.id" , 'os a, cadastro b, veiculo c, cadastro b1, cadastro b2', 'a.*, b.*, c.*, b.nome as nome_cliente, b1.nome as nome_corretor_f, b1.nome_fantasia as nome_corretor_j, b2.nome as nome_seguradora_f, b2.nome_fantasia as nome_seguradora_j');

            $os =  busca_detalhada_um($conexao, "a.cliente_id = 1 AND a.cliente_id = b.id" , 'os a, cadastro b');


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
        case 'salva_os':

            if (strlen($_POST['vistoria_realizada']) <= 0){
                $vistoria_realizada = 'NULL';
            }else{
                $vistoria_realizada = "'".$_POST['vistoria_realizada']."'";
            }

            if (strlen($_POST['autorizacao']) <= 0){
                $autorizacao = 'NULL';
            }else{
                $autorizacao = "'".$_POST['autorizacao']."'";
            }

            if (strlen($_POST['entrada']) <= 0){
                $entrada = 'NULL';
            }else{
                $entrada = "'".$_POST['entrada']."'";
            }

            if (strlen($_POST['saida']) <= 0){
                $saida = 'NULL';
            }else{
                $saida = "'".$_POST['saida']."'";
            }

            if (strlen($_POST['icomplemento']) <= 0){
                $icomplemento = 'NULL';
            }else{
                $icomplemento = "'".$_POST['icomplemento']."'";
            }

            if (strlen($_POST['agendamento']) <= 0){
                $agendamento = 'NULL';
            }else{
                $agendamento = "'".$_POST['agendamento']."'";
            }

            if (strlen($_POST['previsao_entrega']) <= 0){
                $previsao_entrega = 'NULL';
            }else{
                $previsao_entrega = "'".$_POST['previsao_entrega']."'";
            }

            if (strlen($_POST['entregue']) <= 0){
                $entregue = 'NULL';
            }else{
                $entregue = "'".$_POST['entregue']."'";
            }

            if (strlen($_POST['dtRetorno']) <= 0){
                $dtRetorno = 'NULL';
            }else{
                $dtRetorno = "'".$_POST['dtRetorno']."'";
            }

            $check = "'".$_POST['check']."'";

            $campos_valores = ("data_vistoria_realizada = $vistoria_realizada, 
                                data_autorizacao = $autorizacao, data_entrada = $entrada,
                                data_saida = $saida, data_complemento_realizado = $icomplemento,
                                data_agendamento = $agendamento, data_previsao_entrega = $previsao_entrega,
                                data_entrega = $entregue, data_retorno = $dtRetorno, perda_total = $check");

                                
            $condicao = ("id = 1");
            
            $salva_alteracao = altera($conexao, $campos_valores, $condicao, "os");

            if (strlen($salva_alteracao['id']) <= 0 ) {
                print json_encode($salva_alteracao);
            }

            break;
        default:
            break;
    }

}

?>