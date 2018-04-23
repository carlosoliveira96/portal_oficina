<?php
include "../bd/conexao.php";
include "../bd/crud.php";

//Pega a função passada do javascript
$funcao = $_POST["funcao"];

session_start();

//Verifica a função passada
/* Onde:
   salvar = Cadastro
   consulta = Consultar todos os registro ou de acordo com digitado no campo de busca
   consulta_unico = Consultar para realizar operações de alterar e excluir
   excluir = Excluir/Inativar registro
   altera = Alterar registro
*/
switch ($funcao){
    case 'consulta':
        //Pega o valor entrada no input passado pelo javascript
        $desc_funcionario = $_POST["desc_funcionario"];
        $desc_funcionario_cargo = $_POST['desc_funcionario_cargo'];
    
        if (strlen($desc_funcionario) > 0 OR strlen($desc_funcionario_cargo) > 0){
            $condicao = "situacao = 1 AND nome LIKE '%$desc_funcionario%' AND cargo LIKE '%$desc_funcionario_cargo%'";
                        
            $funcionario = busca_detalhada_varios($conexao, $condicao, "funcionario");

        }else {                  
            $condicao = "situacao = 1";
                        
            $funcionario = busca_detalhada_varios($conexao, $condicao, "funcionario");
        }
        
        if ($funcionario != null ) {
            print json_encode($funcionario);
        }
        break;

    case 'busca_usuarios':

        $pesquisa = $_POST['pesquisa'];

        $funcionarios = busca_detalhada_varios($conexao, "a.login = b.login_login and b.nome LIKE '%$pesquisa%' " , "login a , funcionario b ", "b.id , b.nome , b.url_imagem");

        if($funcionarios != null){
            print json_encode($funcionarios);
        }
    
        break;
    case 'alterar':
        $id = "'".$_POST['id']."'";
        $nomeFuncionario = "'".$_POST['nome']."'";
        $cpf = "'".$_POST['cpf']."'";
        $email = "'".$_POST['email']."'";
        $cargo = "'".$_POST['cargo']."'";
        $endereco = "'".$_POST['endereco']."'";
        $numero = "'".$_POST['numero']."'";
        $bairro = "'".$_POST['bairro']."'";
        $cidade = "'".$_POST['cidade']."'";
        $uf = "'".$_POST['uf']."'";

        if (strlen($_POST['telefone']) <= 0){
            $telefone = 'NULL';
        }else{
            $telefone = "'".$_POST['telefone']."'";
        };

        if (strlen($_POST['celular']) <= 0){
            $celular = 'NULL';
        }else{
            $celular = "'".$_POST['celular']."'";
        };
        
        if (strlen($_POST['rg']) <= 0){
            $rg = 'NULL';
        }else{
            $rg = "'".$_POST['rg']."'";
        };

        if (strlen($_POST['orgao_emissor']) <= 0){
            $orgao_emissor = 'NULL';
        }else{
            $orgao_emissor = "'".$_POST['orgao_emissor']."'";
        };

        if (strlen($_POST['cep']) <= 0){
            $cep = 'NULL';
        }else{
            $cep = "'".$_POST['cep']."'";
        };

        if (strlen($_POST['complemento']) <= 0){
            $complemento = 'NULL';
        }else{
            $complemento = "'".$_POST['complemento']."'";
        };

        $destino = "";

        // verifica se foi enviado um arquivo 
        if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
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

        $perfil = 0;
                
        if (strlen($destino) <= 0){
            $destino = 'NULL';
        }else{
            $destino = "'".$destino."'";
        };

        $campos_valores = "nome = $nomeFuncionario, cpf = $cpf, rg = $rg,
        orgao_emissor = $orgao_emissor, telefone = $telefone, celular = $celular,
        cargo = $cargo, cep = $cep, endereco = $endereco, numero = $numero,
        complemento = $complemento, bairro = $bairro, cidade = $cidade, uf = $uf,
        url_imagem = $destino, email = $email";
        $condicao = "id = $id";

        $funcionario = altera($conexao, $campos_valores, $condicao, "funcionario");

        if (strlen($funcionario['id']) <= 0 ) {
            print json_encode($funcionario);
        }
    default:
        break;
}