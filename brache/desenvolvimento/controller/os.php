<?php
include('../bd/crud.php');
include('../bd/conexao.php');

if(isset($_POST['funcao'])){
    $funcao = $_POST['funcao'];

    switch ($funcao){
        case 'buscar_funcionario':
            if (empty($_POST['pesquisa'])){
                $funcionarios = busca_detalhada_varios($conexao, "situacao = 1" , 'funcionario', 'id, nome');
            }else {
                $pesquisa = $_POST['pesquisa'];
                $funcionarios = busca_detalhada_varios($conexao, "situacao = 1 and nome LIKE '%{$pesquisa}%'" , 'funcionario', 'id, nome');
            }

            if($funcionarios != null){
                print json_encode($funcionarios);
            }

            break;
        case 'buscar_os':
            $id = $_POST['id'];
            $condicao = "a.id = '$id' AND a.cliente_id = b.id AND a.veiculo_placa = c.placa AND (a.corretor_id is null or a.corretor_id = b1.id) AND (a.seguradora_id is null or a.seguradora_id = b2.id) GROUP BY a.id";
            
            $os =  busca_detalhada_um($conexao, $condicao, 'os a, cadastro b, veiculo c, cadastro b1, cadastro b2', 'a.*, a.id as id_os, a.tipo as tipo_cadastro, b.*, c.*, b.nome as nome_cliente, b1.nome as nome_corretor_f, b1.nome_fantasia as nome_corretor_j, b2.nome as nome_seguradora_f, b2.nome_fantasia as nome_seguradora_j');

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

            if(strlen($data_inicio) <= 0){
                $data_inicio = "01/01/0001";
            }

            if(strlen($data_fim) <= 0){
                $data_fim = "31/12/9999";
            }

            $data_inicio = date_format(date_create_from_format('d/m/Y', $data_inicio), 'Y/m/d');
            $data_fim = date_format(date_create_from_format('d/m/Y', $data_fim), 'Y/m/d');  
            //$data1 = new DateTime($data_inicio);
            //$data_inicio = date_format($data1, 'Y/m/d');
            //$data2 = new DateTime($data_final );
            //$data_fim = date_format($data2, 'Y/m/d');  
            
            
            $os ="";
            if (strlen($corretor) > 0 && strlen($seguradora) > 0 ){
                $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND a.corretor_id = '{$corretor}' AND a.seguradora_id = '{$seguradora} ' AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}' " , "os a , veiculo b , cadastro c " , "a.*, a.id as id_os, c.*, b.placa, b.modelo");
            }else if (strlen($corretor) <= 0 && strlen($seguradora) <= 0){
                $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}'" , "os a , veiculo b , cadastro c ", "a.*, a.id as id_os, c.*, b.placa, b.modelo");                
            }else if(strlen($seguradora) <= 0){
                $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND a.corretor_id = '{$corretor}' AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}'" , "os a , veiculo b , cadastro c ", "a.*, a.id as id_os, c.*, b.placa, b.modelo");
            }else if(strlen($corretor) <= 0){
                $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%')  AND a.seguradora_id = '{$seguradora}' AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}'" , "os a , veiculo b , cadastro c ", "a.*, a.id as id_os, c.*, b.placa, b.modelo");
            }
            // $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND a.corretor_id = '{$corretor}' AND a.seguradora_id = '{$seguradora} ' " , "os a , veiculo b , cadastro c ");

            if($os != null){
                print json_encode($os);
            }

            break;
        case 'busca_carros':
            $condicao = 'a.placa not in (select b.veiculo_placa from os b) and a.situacao = 1';
            $tabela = 'veiculo a';
            $campos = '*';
            
            $carros = busca_detalhada_varios($conexao, $condicao, $tabela, $campos);

            if($carros != null){
                print json_encode($carros);
            }
        break;
        case 'busca_pendencias_inicio':
            $pesquisa = $_POST['pesquisa'];
            $corretor = $_POST['corretor'];
            $seguradora = $_POST['seguradora'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            if(strlen($data_inicio) <= 0){
                $data_inicio = "01/01/0001";
            }

            if(strlen($data_fim) <= 0){
                $data_fim = "31/12/9999";
            }

            $data_inicio = date_format(date_create_from_format('d/m/Y', $data_inicio), 'Y/m/d');
            $data_fim = date_format(date_create_from_format('d/m/Y', $data_fim), 'Y/m/d');  
            //$data1 = new DateTime($data_inicio);
            //$data_inicio = date_format($data1, 'Y/m/d');
            //$data2 = new DateTime($data_final );
            //$data_fim = date_format($data2, 'Y/m/d');   

            /*$os ="";
            if (strlen($corretor) > 0 && strlen($seguradora) > 0 ){
                $os = busca_detalhada_varios($conexao, "d.os_id = a.id and d.pendencias_id = e.id  AND e.funcionario_id = f.id AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND a.corretor_id = '{$corretor}' AND a.seguradora_id = '{$seguradora} ' AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}' " , "os a , veiculo b , cadastro c, os_pendencias d , pendencias e , funcionario f " , "*,  group_concat(e.servico) AS servicos, group_concat(f.nome) AS funcionarios");
            }else if (strlen($corretor) <= 0 && strlen($seguradora) <= 0){
                $condicao = "d.os_id = a.id and d.pendencias_id = e.id  AND e.funcionario_id = f.id AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  LIKE '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '".$data_inicio."' AND '".$data_fim."' group by d.pendencias_id";
                $os = busca_detalhada_varios($conexao, $condicao , "os a , veiculo b , cadastro c, os_pendencias d , pendencias e , funcionario f", "a.*, b.*, c.*, d.*,  e.servico as servicos, f.nome as funcionarios");                
            }else if(strlen($seguradora) <= 0){
                $os = busca_detalhada_varios($conexao, "d.os_id = a.id and d.pendencias_id = e.id  AND e.funcionario_id = f.id AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND a.corretor_id = '{$corretor}' AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}'" ,"os a , veiculo b , cadastro c, os_pendencias d , pendencias e , funcionario f ", "*,  group_concat(e.servico) AS servicos, group_concat(f.nome) AS funcionarios");
            }else if(strlen($corretor) <= 0){
                $os = busca_detalhada_varios($conexao, "d.os_id = a.id and d.pendencias_id = e.id  AND e.funcionario_id = f.id AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%')  AND a.seguradora_id = '{$seguradora}' AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '{$data_inicio}' AND '{$data_fim}'" , "os a , veiculo b , cadastro c, os_pendencias d , pendencias e , funcionario f ", "*,  group_concat(e.servico) AS servicos, group_concat(f.nome) AS funcionarios");
            }*/
            // $os = busca_detalhada_varios($conexao, "a.cliente_id = c.id AND a.veiculo_placa = b.placa AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  OR '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND a.corretor_id = '{$corretor}' AND a.seguradora_id = '{$seguradora} ' " , "os a , veiculo b , cadastro c ");
            //$condicao = "d.os_id = a.id and d.pendencias_id = e.id  AND e.funcionario_id = f.id AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  LIKE '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '".$data_inicio."' AND '".$data_fim."' group by d.pendencias_id";
            $condicao = "d.os_id = a.id and d.pendencias_id = e.id  AND e.funcionario_id = f.id AND (b.placa like '%{$pesquisa}%' OR a.sinistro  LIKE '%{$pesquisa}%' OR c.nome  LIKE '%{$pesquisa}%' OR b.modelo LIKE '%{$pesquisa}%') AND (c.razao_social LIKE '%{$corretor}%' or c.nome_fantasia LIKE '%{$corretor}%') AND (c.razao_social LIKE '%{$seguradora}%' or c.nome_fantasia LIKE '%{$seguradora}%') AND STR_TO_DATE( a.data_cadastro , '%d/%m/%Y' ) BETWEEN '".$data_inicio."' AND '".$data_fim."' group by d.pendencias_id";
            $os = busca_detalhada_varios($conexao, $condicao, "os a, veiculo b, cadastro c, os_pendencias d, pendencias e, funcionario f", "a.*, b.*, c.*, d.*, e.servico as servicos, f.nome as funcionarios");

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

            if (strlen($_POST['termo']) <= 0){
                $termo = 'NULL';
            }else{
                $termo = "'".$_POST['termo']."'";
            }

            $check = "'".$_POST['check']."'";
            $check_tc = "'".$_POST['check_tc']."'";
            $id = $_POST['id'];

            $campos_valores = ("data_vistoria_realizada = $vistoria_realizada, 
                                data_autorizacao = $autorizacao, data_entrada = $entrada,
                                data_saida = $saida, data_complemento_realizado = $icomplemento,
                                data_agendamento = $agendamento, data_previsao_entrega = $previsao_entrega,
                                data_entrega = $entregue, data_retorno = $dtRetorno, perda_total = $check,
                                situacao_tc = $check_tc, termo_comp = $termo");

            $condicao = ("id = '$id'");
            
            $salva_alteracao = altera($conexao, $campos_valores, $condicao, "os");

            if (strlen($salva_alteracao['id']) <= 0 ) {
                print json_encode($salva_alteracao);
            }

            $pendencia = $_POST['pendencia'];

            if($pendencia = '1'){
                $servico_pendencia = $_POST['servico_pendencia'];
                $id_funcionario = $_POST['id_funcionario'];

                $campos = "servico, funcionario_id";
                $valores = "'$servico_pendencia', '$id_funcionario'";

                $inclui_pendencia = insere($conexao, $campos, $valores, 'pendencias');

                if (strlen($inclui_pendencia['id']) <= 0 ) {
                    $id_pendencia = json_encode($inclui_pendencia);

                    $campos = "os_id, pendencias_id";
                    
                    $valores = "'$id', '$id_pendencia'"; 

                    $inclui_os_pendencia = insere($conexao, $campos, $valores, 'os_pendencias');

                    if (strlen($inclui_os_pendencia['id']) <= 0 ) {
                        print json_encode($inclui_os_pendencia);
                    }
                }
            }

            break;
        case 'buscar_pendencias':
            $id = $_POST['id'];

            $condicao = "a.pendencias_id = c.id AND a.os_id = '$id' AND c.funcionario_id = b.id";
            $tabelas = "os_pendencias a, funcionario b, pendencias c";

            $pendencias = busca_detalhada_varios($conexao, $condicao , $tabelas, 'c.id, b.nome, c.servico');

            if($pendencias != null){
                print json_encode($pendencias);
            }

            break;
        case 'salva_registroI':
            $id = $_POST['id'];
            $mensagem = $_POST['mensagem'];
            $id_logado = $_POST['id_funcionario'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];

            $campos = "observacao, os_id, data, hora, funcionario_id";
            $valores = "'$mensagem', '$id', '$data', '$hora', '$id_logado'";

            $registro_interno = insere($conexao, $campos, $valores, 'observacao');

            if (strlen($registro_interno['id']) <= 0 ) {
                print json_encode($registro_interno);
            }

        break;
        case 'recupera_id':
            $nome_usuario = $_POST['nome_usuario'];

            $condicao = "login_login = '$nome_usuario'";

            $id_funcionario = busca_detalhada_um($conexao, $condicao, 'funcionario', 'id');

            if($id_funcionario != null){
                print json_encode($id_funcionario);
            }
        break;
        case 'busca_registro_interno':
            $id = $_POST['id'];
            $id_logado = $_POST['id_funcionario'];

            $condicao = "a.os_id = '$id' AND a.funcionario_id = b.id order by a.id desc";
            $tabelas = "observacao a, funcionario b";
            $campos = "a.*, b.nome";
            
            $mensagens_interna = busca_detalhada_varios($conexao, $condicao , $tabelas, $campos);

            if($mensagens_interna != null){
                print json_encode($mensagens_interna);
            }
        break;
        case 'salva_registroC':
            $id = $_POST['id'];
            $mensagem = $_POST['mensagem'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];
            $id_funcionario_de = $_POST['id_funcionario_de'];
            $id_funcionario_para = $_POST['id_funcionario_para'];

            $campos = "mensagem, data, hora, de_funcionario_id, para_funcionario_id";
            $valores = "'$mensagem', '$data', '$hora', '$id_funcionario_de', '$id_funcionario_para'";

            $mensagem_comunicador = insere($conexao, $campos, $valores, 'mensagem');

            if (strlen($mensagem_comunicador['id']) <= 0 ) {
                $id_mensagem = json_encode($mensagem_comunicador);

                $campos = "os_id, mensagen_id";
                
                $valores = "'$id', '$id_mensagem'"; 

                $inclui_os_pendencia = insere($conexao, $campos, $valores, 'os_mensagem');

                if (strlen($inclui_os_pendencia['id']) <= 0 ) {
                    print json_encode($inclui_os_pendencia);
                }
            }
        break;
        case 'busca_mensagem_comunicador':
            $id = $_POST['id'];
            $id_logado = $_POST['id_funcionario'];

            $condicao = "b.os_id = '$id' AND a.id = b.mensagen_id AND a.de_funcionario_id = c.id AND a.para_funcionario_id = d.id GROUP BY hora ORDER BY a.id DESC";
            $tabelas = "mensagem a, os_mensagem b, funcionario c, funcionario d";
            $campos = "a.*, c.nome AS de, group_concat(d.nome) AS para";
            
            $mensagens_interna = busca_detalhada_varios($conexao, $condicao , $tabelas, $campos);

            if($mensagens_interna != null){
                print json_encode($mensagens_interna);
            }
        break;
        case 'buscar_servicos':
            $id = $_POST['id'];

            $condicao = "a.os_id = '$id' and a.servico_id = b.id and a.funcionario_id = c.id and a.situacao = 1";
            $tabelas = "os_servico a, servico b, funcionario c";
            $campos = "a.os_id, b.descricao, a.data_inicio, c.nome, a.data_fim";

            $servicos = busca_detalhada_varios($conexao, $condicao , $tabelas, $campos);
            
    
            if($servicos != null){
                print json_encode($servicos);
            }
        break;
        case 'busca_expediente':
            $expedientes = busca_todos($conexao, 'expediente');
            
            if($expedientes != null){
                print json_encode($expedientes);
            }
        break;
        default:
        break;
    }

}

?>