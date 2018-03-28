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

            if ($funcionario != null ) {
                print json_encode($funcionario);
            } else {
                print 0;
            }

        }else {                        
            $funcionario = busca_todos($conexao, "funcionario");

            if ($funcionario != null ) {
                print json_encode($funcionario);
            } else {
                print 0;
            }
        }
        break;

    case 'busca_usuarios':

        $pesquisa = $_POST['pesquisa'];

        $funcionarios = busca_detalhada_varios($conexao, "a.login = b.login_login and b.nome LIKE '%$pesquisa%' " , "login a , funcionario b ", "b.id , b.nome , b.url_imagem");

        if($funcionarios != null){
            print json_encode($funcionarios);
        }
    
        break;
    default:
        break;
}