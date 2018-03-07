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
        case 'cadastro_os':

            $corretor = $_POST['corretor'];

            if (strlen($corretor) <= 0){
                $corretor = 'NULL';
            }else{
                $corretor = "'".$corretor."'";
            }

            $seguradora = $_POST['seguradora'];

            if (strlen($seguradora) <= 0){
                $seguradora = 'NULL';
            }else{
                $seguradora = "'".$seguradora."'";
            }

            $valor = $_POST['valor'];

            if (strlen($valor) <= 0){
                $valor = 'NULL';
            }else{
                $valor = "'".$valor."'";
            }

            $sinistro = $_POST['sinistro'];

            if (strlen($sinistro) <= 0){
                $sinistro = 'NULL';
            }else{
                $sinistro = "'".$sinistro."'";
            }

            $cliente_id = $_POST['cliente_id'];
            $cliente_id = "'".$cliente_id."'";

            $placa = $_POST['placa'];
            $placa = "'".$placa."'";

            $data_entrada = $_POST['data_entrada'];
            $data_entrada = "'".$data_entrada."'";

            $empresa_id = $_POST['empresa_id'];
            $empresa_id = "'".$empresa_id."'";

            $tipo = $_POST['tipo'];
            $tipo = "'".$tipo."'";

            $destino = "";
            // verifica se foi enviado um arquivo 
            if (isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {
                $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
                $nome = $_FILES['arquivo']['name'];
                // Pega a extensao
                $extensao = strrchr($nome, '.');
                // Converte a extensao para mimusculo
                $extensao = strtolower($extensao);
                // Somente imagens, .jpg;.jpeg;.gif;.png
                // Aqui eu enfilero as extesões permitidas e separo por ';'
                // Isso server apenas para eu poder pesquisar dentro desta String
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                    // Cria um nome único para esta imagem
                    // Evita que duplique as imagens no servidor.
                    $novoNome = md5(microtime()) . $extensao;
                    // Concatena a pasta com o nome
                    $destino = "../imagens/". $novoNome;

                    @move_uploaded_file($arquivo_tmp, $destino);

                    
                }
            } 
                
            if (strlen($destino) <= 0){
                $destino = 'NULL';
            }else{
                $destino = "'".$destino."'";
            };

            $campos = " tipo , data_entrada , sinistro , valor_total , url  , empresa_id , situacao, cliente_id , veiculo_placa , corretor_id , seguradora_id";
            $valores= "{$tipo} , {$data_entrada} , {$sinistro} , {$valor} , {$destino} , {$empresa_id} , 1 , {$cliente_id} , {$placa} , {$corretor} , {$seguradora} ";
            
            $os = insere($conexao, $campos , $valores , "os"); 

            if (strlen($os['id']) <= 0 ) {
                print json_encode($os);
            }

            break;
        
        case 'cadastro_servicos':
            
            $os_id = $_POST['os_id'];
            $os_id = "'".$os_id."'";

            $servico_id = $_POST['servico_id'];
            $servico_id = "'".$servico_id."'";

            $funcionario_id = $_POST['funcionario_id'];
            $funcionario_id = "'".$funcionario_id."'";

            $qtd = $_POST['qtd'];

            if ($qtd == 0){
                $qtd = 'NULL';
            }else{
                $qtd = "'".$qtd."'";
            }

            $complemento = $_POST['complemento'];
            $complemento = "'".$complemento."'";

            $campos = " os_id , servico_id , funcionario_id , qtd , status  , situacao, complemento ";
            $valores= "{$os_id} , {$servico_id} , {$funcionario_id} , {$qtd} , 'A iniciar' , 1 , {$complemento} ";
            
            $os_servico = insere($conexao, $campos , $valores , "os_servico"); 

            if(strlen($os_servico) <= 0){
                die();
            }else{
                print json_encode($os_servico);
            }

            break;
        default:
            break;
    }

}

?>