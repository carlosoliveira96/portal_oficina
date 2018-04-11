<?php
include "../bd/conexao.php";
include "../bd/crud.php";

//Pega a função passada do javascript
$funcao = $_POST["funcao"];
session_start();

switch ($funcao){
    case 'busca_mensagem':

        $login = $_POST['login'];
        $funcionario_id1 = $_POST['funcionario'];

        $funcionario = busca_detalhada_um($conexao, "login_login = '{$login}' " , 'funcionario' );

        $id_funcionario = $funcionario['id'];

        $mensagens = busca_detalhada_varios($conexao, "( funcionario_id = {$funcionario_id1} and funcionario_id1 = {$id_funcionario} ) or (funcionario_id = {$id_funcionario} and funcionario_id1 = {$funcionario_id1})" , 'comunicador' );

        if($mensagens != null){
            print json_encode($mensagens);
        }

        break;
    case 'salva_mensagem':

        $login = $_POST['login'];
        $funcionario_id1 = $_POST['funcionario_id1'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $msg = $_POST['mensagem'];

        $funcionario = busca_detalhada_um($conexao, "login_login = '{$login}' " , 'funcionario' );

        $id_funcionario = $funcionario['id'];

        $campos = "funcionario_id , funcionario_id1 , data , hora , mensagem ";
        $valores = " '{$id_funcionario}' , '{$funcionario_id1}', '{$data}' , '{$hora}' , '{$msg}' ";

        $mensagem = insere($conexao, $campos , $valores , 'comunicador' );

        if(strlen($mensagem) > 0){
            print '1';
        }

        break;
    case 'busca_meu_id':

        $login = $_POST['login'];


        $funcionario = busca_detalhada_um($conexao, "login_login = '{$login}' " , 'funcionario' );

        $id_funcionario = $funcionario['id'];

        if($id_funcionario > 0){
            print $id_funcionario;
        }

        break;
    case 'busca_conversas':
        $pesquisa = $_POST['pesquisa'];
        $meu_id = $_POST['meu_id'];

        $funcionarios = busca_detalhada_varios($conexao, "a.funcionario_id = '{$meu_id}' and a.funcionario_id1 = b.id  and b.nome LIKE '%$pesquisa%' group by  a.funcionario_id1 " , "comunicador a , funcionario b ", "b.id , b.nome , b.url_imagem");
        $funcionarios1 = busca_detalhada_varios($conexao, "a.funcionario_id1 = '{$meu_id}' and a.funcionario_id = b.id  and b.nome LIKE '%$pesquisa%' group by  a.funcionario_id " , "comunicador a , funcionario b ", "b.id , b.nome , b.url_imagem");


        $result = array_merge($funcionarios , $funcionarios1);

        if($result != null ){
            print json_encode($result);
        }
        break;
    default:
        break;
}