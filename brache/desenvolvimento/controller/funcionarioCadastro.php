<?php

include "../bd/conexao.php";
include "../bd/crud.php";
if (isset($_POST['funcao'])){
$funcao = $_POST['funcao'];

switch ($funcao){
    case 'cadastro':

        $nomeFuncionario = $_POST['nome'];
        $nomeFuncionario = "'".$nomeFuncionario."'";

        $cpf = $_POST['cpf'];
        $cpf = "'".$cpf."'";

        $nascimento = $_POST['nascimento'];
        $nascimento = "'".$nascimento."'";

        $email = $_POST['email'];
        $email = "'".$email."'";

        $telefone = $_POST['telefone'];
        if (strlen($telefone) <= 0){
            $telefone = 'NULL';
        }else{
            $telefone = "'".$telefone."'";
        };

        $celular = $_POST['celular'];
        if (strlen($celular) <= 0){
            $celular = 'NULL';
        }else{
            $celular = "'".$celular."'";
        };

        $nome_usuario = $_POST['nome_usuario'];
        $nome_usuario = "'".$nome_usuario."'";
        
        $cargo = $_POST['cargo'];
        $cargo = "'".$cargo."'";

        $rg = $_POST['rg'];
        if (strlen($rg) <= 0){
            $rg = 'NULL';
        }else{
            $rg = "'".$rg."'";
        };

        $orgao_emissor = $_POST['orgao_emissor'];
        if (strlen($orgao_emissor) <= 0){
            $orgao_emissor = 'NULL';
        }else{
            $orgao_emissor = "'".$orgao_emissor."'";
        };

        $cep = $_POST['cep'];

        if (strlen($cep) <= 0){
            $cep = 'NULL';
        }else{
            $cep = "'".$cep."'";
        };

        $endereco = $_POST['endereco'];
        $endereco = "'".$endereco."'";

        $numero = $_POST['numero'];
        $numero = "'".$numero."'";

        $complemento = $_POST['complemento'];
        if (strlen($complemento) <= 0){
            $complemento = 'NULL';
        }else{
            $complemento = "'".$complemento."'";
        };

        $bairro = $_POST['bairro'];
        $bairro = "'".$bairro."'";

        $cidade = $_POST['cidade'];
        $cidade = "'".$cidade."'";

        $uf = $_POST['uf'];
        $uf = "'".$uf."'";

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
        $perfil = 0;
               
        if (strlen($destino) <= 0){
            $destino = 'NULL';
        }else{
            $destino = "'".$destino."'";
        };

        if ($cargo == "financeiro"){
            $perfil = 2;
        }else{
            $perfil = 6;
        }

        $senhaMd5 = md5('123456'); 
        $campos_login =  "login , senha , perfil_id , primeiro_acesso";
        $valores_login =  " {$nome_usuario} ,'{$senhaMd5}' ,'{$perfil}' , '1' ";
        $login = insere($conexao, $campos_login , $valores_login , "login" ); 

        if(strlen($login) <= 0){
            die();
        }

        
        $campos  = "nome , cpf , rg , orgao_emissor , data_nascimento , telefone , celular , login_login , cargo , situacao , cep , endereco , numero , complemento , bairro , cidade , uf , url_imagem , email ";
        $valores = "{$nomeFuncionario} , {$cpf} , {$rg} , {$orgao_emissor} , {$nascimento} , {$telefone} , {$celular} , {$nome_usuario} , {$cargo} , 1 , {$cep} , {$endereco} , {$numero} , {$complemento} , {$bairro} , {$cidade} , {$uf} , {$destino} , {$email} ";  
        
        $funcionario = insere($conexao, $campos , $valores , "funcionario"); 

        if (strlen($funcionario['id']) <= 0 ) {
            print json_encode($funcionario);
        }

        break;
    case 'verifica_cpf':
            $cpf = $_POST['cpf'];
            
            $cliente = busca_detalhada_um($conexao, " cpf = '{$cpf}' " , "funcionario" );
    
            if (strlen($cliente['id']) > 0 ) {
                print json_encode($cliente);
            }
     
            break;
    default:
        break;
}
?>